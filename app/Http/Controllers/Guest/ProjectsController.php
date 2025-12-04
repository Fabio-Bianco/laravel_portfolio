<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class ProjectsController extends Controller
{
    public function index()
    {
        // Filtro solo per tipo: ?type=slug
        $typeSlug = request('type');

        $query = Project::with(['technologies','type'])
            ->published()
            ->ordered();

        $currentType = null;
        if ($typeSlug) {
            $currentType = Type::where('slug', $typeSlug)->first();
            if ($currentType) {
                $query->where('type_id', $currentType->id);
            }
        }

        $projects = $query->paginate(9)->withQueryString();

        // Liste ordinate e conteggi (solo progetti published)
        $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();

        // Contatori ottimizzati: una query singola invece di N query
        $typeCounts = Project::published()
            ->groupBy('type_id')
            ->selectRaw('type_id, count(*) as count')
            ->pluck('count', 'type_id');

        // Tecnologie divise per categoria
        $technologiesByCategory = [
            'frontend' => Technology::byCategory('frontend')->orderBy('name')->get(),
            'backend' => Technology::byCategory('backend')->orderBy('name')->get(),
            'dev-tools' => Technology::byCategory('dev-tools')->orderBy('name')->get(),
        ];

        // Skill levels e descrizioni per le tecnologie
        $skillsData = $this->getSkillsData();

        // Tecnologie in apprendimento
        $learningTechnologies = Technology::where('is_learning', true)
            ->orderBy('name')
            ->get();

        // Bio dinamica dall'admin
        $adminUser = \App\Models\User::where('email', 'admin@portfolio.it')->first();
        $bioParagraphs = [];
        if ($adminUser && $adminUser->bio) {
            $bioParagraphs = explode('|', $adminUser->bio);
        }

        // Mapping completo delle icone DevIcon
        $iconMapping = $this->getIconMapping();

        return view('guest.index-minimal', [
            'projects' => $projects,
            'allTypes' => $allTypes,
            'currentType' => $currentType,
            'typeCounts' => $typeCounts,
            'technologiesByCategory' => $technologiesByCategory,
            'skillsData' => $skillsData,
            'learningTechnologies' => $learningTechnologies,
            'bioParagraphs' => $bioParagraphs,
            'iconMapping' => $iconMapping,
        ]);
    }

    public function show(Project $project)
    {
        // Mostra anche progetti non pubblicati se sei admin, altrimenti solo published
        if (!$project->is_published && (!auth()->check() || !auth()->user()->is_admin)) {
            abort(404);
        }
        
        $project->load(['technologies','type']);
        return view('guest.projects.show-minimal', compact('project'));
    }

    public function byTechnology(Technology $technology)
    {
        $projects = Project::with(['technologies','type'])
            ->published()
            ->whereHas('technologies', fn($q) => $q->where('technologies.id', $technology->id))
            ->ordered()
            ->paginate(9)
            ->withQueryString();

        $allTechnologies = Technology::orderBy('name')->get();
        $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();
        
        // Calcola i contatori ottimizzati
        $technologyCounts = Project::published()
            ->join('project_technology', 'projects.id', '=', 'project_technology.project_id')
            ->groupBy('project_technology.technology_id')
            ->selectRaw('project_technology.technology_id as tech_id, count(distinct projects.id) as count')
            ->pluck('count', 'tech_id');

        $typeCounts = Project::published()
            ->join('project_technology', 'projects.id', '=', 'project_technology.project_id')
            ->where('project_technology.technology_id', $technology->id)
            ->groupBy('type_id')
            ->selectRaw('type_id, count(*) as count')
            ->pluck('count', 'type_id');
        
        // Tecnologie divise per categoria
        $technologiesByCategory = [
            'frontend' => Technology::byCategory('frontend')->orderBy('name')->get(),
            'backend' => Technology::byCategory('backend')->orderBy('name')->get(),
            'dev-tools' => Technology::byCategory('dev-tools')->orderBy('name')->get(),
        ];

        // Skill levels e descrizioni per le tecnologie
        $skillsData = $this->getSkillsData();
        
        // Tecnologie in apprendimento
        $learningTechnologies = Technology::where('is_learning', true)
            ->orderBy('name')
            ->get();
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'currentTechnology' => $technology,
            'allTechnologies' => $allTechnologies,
            'allTypes' => $allTypes,
            'technologyCounts' => $technologyCounts,
            'typeCounts' => $typeCounts,
            'technologiesByCategory' => $technologiesByCategory,
            'skillsData' => $skillsData,
            'learningTechnologies' => $learningTechnologies,
        ]);
    }

    public function byTechnologySlug(string $slug)
    {
        $technology = Technology::where('slug', $slug)->first();
        if (!$technology) {
            abort(404);
        }
        return $this->byTechnology($technology);
    }

    public function byType(Type $type)
    {
        $projects = Project::with(['technologies','type'])
            ->published()
            ->where('type_id', $type->id)
            ->ordered()
            ->paginate(9)
            ->withQueryString();

        $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();
        
        // Calcola i contatori ottimizzati
        $typeCounts = Project::published()
            ->groupBy('type_id')
            ->selectRaw('type_id, count(*) as count')
            ->pluck('count', 'type_id');
        
        // Tecnologie divise per categoria
        $technologiesByCategory = [
            'frontend' => Technology::byCategory('frontend')->orderBy('name')->get(),
            'backend' => Technology::byCategory('backend')->orderBy('name')->get(),
            'dev-tools' => Technology::byCategory('dev-tools')->orderBy('name')->get(),
        ];

        // Skill levels e descrizioni per le tecnologie
        $skillsData = $this->getSkillsData();
        
        // Tecnologie in apprendimento
        $learningTechnologies = Technology::where('is_learning', true)
            ->orderBy('name')
            ->get();
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'currentType' => $type,
            'allTypes' => $allTypes,
            'typeCounts' => $typeCounts,
            'technologiesByCategory' => $technologiesByCategory,
            'skillsData' => $skillsData,
            'learningTechnologies' => $learningTechnologies,
        ]);
    }

    public function byTypeSlug(string $slug)
    {
        $type = Type::where('slug', $slug)->first();
        if (!$type) {
            abort(404);
        }
        return $this->byType($type);
    }

    /**
     * Mapping completo delle icone DevIcon per tutte le tecnologie
     * Evita mapping hardcoded nel template e gestisce fallback
     */
    private function getIconMapping()
    {
        return [
            // Languages
            'C' => 'devicon-c-plain colored',
            'C++' => 'devicon-cplusplus-plain colored',
            'Java' => 'devicon-java-plain colored',
            'JavaScript' => 'devicon-javascript-plain colored',
            'TypeScript' => 'devicon-typescript-plain colored',
            'PHP' => 'devicon-php-plain colored',
            'Python' => 'devicon-python-plain colored',
            'HTML' => 'devicon-html5-plain colored',
            'CSS' => 'devicon-css3-plain colored',

            // Frontend Frameworks
            'React' => 'devicon-react-original colored',
            'Vue.js' => 'devicon-vuejs-plain colored',
            'Angular' => 'devicon-angularjs-plain colored',
            'Bootstrap' => 'devicon-bootstrap-plain colored',
            'Tailwind CSS' => 'devicon-tailwindcss-plain colored',
            'Sass' => 'devicon-sass-original colored',

            // Backend Frameworks
            'Laravel' => 'devicon-laravel-plain colored',
            'Node.js' => 'devicon-nodejs-plain colored',
            'Express' => 'devicon-express-original colored',
            'Symfony' => 'devicon-symfony-original colored',

            // Databases
            'MySQL' => 'devicon-mysql-plain colored',
            'PostgreSQL' => 'devicon-postgresql-plain colored',
            'SQLite' => 'devicon-sqlite-plain colored',
            'MongoDB' => 'devicon-mongodb-plain colored',
            'Redis' => 'devicon-redis-plain colored',

            // Tools & DevOps
            'Git' => 'devicon-git-plain colored',
            'GitHub' => 'devicon-github-original colored',
            'Docker' => 'devicon-docker-plain colored',
            'Kubernetes' => 'devicon-kubernetes-plain colored',
            'VS Code' => 'devicon-vscode-plain colored',
            'PHPStorm' => 'devicon-phpstorm-plain colored',
            'Composer' => 'devicon-composer-line colored',
            'npm' => 'devicon-npm-original-wordmark colored',
            'Webpack' => 'devicon-webpack-plain colored',
            'Vite' => 'devicon-vitejs-plain colored',
            'Postman' => 'devicon-postman-plain colored',
            'ESLint' => 'devicon-eslint-original colored',
            'Prettier' => 'devicon-prettier-plain colored',
            'Laravel Pint' => 'devicon-laravel-plain colored',
            'Chrome DevTools' => 'devicon-chrome-plain colored',

            // Cloud & Services
            'AWS' => 'devicon-amazonwebservices-original colored',
            'Digital Ocean' => 'devicon-digitalocean-plain colored',
            'Heroku' => 'devicon-heroku-original colored',

            // Default fallback
            'default' => 'devicon-devicon-plain colored'
        ];
    }

    /**
     * Skill levels e descrizioni per le tecnologie principali
     * Usa icone da DevIcons CDN per evitare SVG hardcoded
     */
    private function getSkillsData()
    {
        return [
            // Backend Stack
            'PHP' => [
                'level' => 90,
                'description' => 'Server-side scripting, API development, data processing',
                'icon' => 'devicon-php-plain colored'
            ],
            'Laravel' => [
                'level' => 95,
                'description' => 'MVC architecture, RESTful APIs, authentication, ORM',
                'icon' => 'devicon-laravel-plain colored'
            ],
            'Node.js' => [
                'level' => 75,
                'description' => 'JavaScript runtime per backend development',
                'icon' => 'devicon-nodejs-plain colored'
            ],
            'Express.js' => [
                'level' => 70,
                'description' => 'Web framework per Node.js API development',
                'icon' => 'devicon-express-original colored'
            ],
            'REST API' => [
                'level' => 85,
                'description' => 'RESTful web services, HTTP protocols, API design',
                'icon' => 'devicon-fastapi-plain colored'
            ],
            'MySQL' => [
                'level' => 85,
                'description' => 'Database design, complex queries, optimization',
                'icon' => 'devicon-mysql-plain colored'
            ],

            // Frontend Technologies 
            'CSS3' => [
                'level' => 92,
                'description' => 'Flexbox, Grid, animations, responsive design',
                'icon' => 'devicon-css3-plain colored'
            ],
            'JavaScript' => [
                'level' => 88,
                'description' => 'ES6+, async programming, DOM manipulation, modules',
                'icon' => 'devicon-javascript-plain colored'
            ],
            'Blade' => [
                'level' => 90,
                'description' => 'Laravel templating engine per dynamic views',
                'icon' => 'devicon-laravel-plain colored'
            ],
            'React' => [
                'level' => 80,
                'description' => 'Components, hooks, state management, React Router',
                'icon' => 'devicon-react-original colored'
            ],
            'Bootstrap' => [
                'level' => 89,
                'description' => 'Component library, responsive grid, utilities',
                'icon' => 'devicon-bootstrap-plain colored'
            ],
            'Tailwind CSS' => [
                'level' => 75,
                'description' => 'Utility-first CSS framework per rapid styling',
                'icon' => 'devicon-tailwindcss-plain colored'
            ],

            // Dev & Tools
            'Git' => [
                'level' => 87,
                'description' => 'Version control, branching, merging, collaboration',
                'icon' => 'devicon-git-plain colored'
            ],
            'npm' => [
                'level' => 85,
                'description' => 'Package manager per Node.js, dependency management',
                'icon' => 'devicon-npm-original-wordmark colored'
            ],
            'Composer' => [
                'level' => 80,
                'description' => 'PHP dependency manager, autoloading, package installation',
                'icon' => 'devicon-composer-line colored'
            ],
            'Postman' => [
                'level' => 78,
                'description' => 'API testing, documentation, collaboration platform',
                'icon' => 'devicon-postman-plain colored'
            ],
        ];
    }

    public function featured()
    {
        $projects = Project::with(['technologies','type'])
            ->featured()
            ->orderBy('featured_order', 'asc')
            ->orderBy('display_order', 'asc')
            ->orderByDesc('updated_at_github')
            ->paginate(9)
            ->withQueryString();

        $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();
        
        $typeCounts = Project::published()
            ->groupBy('type_id')
            ->selectRaw('type_id, count(*) as count')
            ->pluck('count', 'type_id');
        
        // Tecnologie divise per categoria
        $technologiesByCategory = [
            'frontend' => Technology::byCategory('frontend')->orderBy('name')->get(),
            'backend' => Technology::byCategory('backend')->orderBy('name')->get(),
            'dev-tools' => Technology::byCategory('dev-tools')->orderBy('name')->get(),
        ];

        // Skill levels e descrizioni per le tecnologie
        $skillsData = $this->getSkillsData();
        
        // Tecnologie in apprendimento
        $learningTechnologies = Technology::where('is_learning', true)
            ->orderBy('name')
            ->get();

        // Bio dinamica dall'admin
        $adminUser = \App\Models\User::where('email', 'admin@portfolio.it')->first();
        $bioParagraphs = [];
        if ($adminUser && $adminUser->bio) {
            $bioParagraphs = explode('|', $adminUser->bio);
        }

        // Mapping completo delle icone DevIcon
        $iconMapping = $this->getIconMapping();
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'allTypes' => $allTypes,
            'typeCounts' => $typeCounts,
            'technologiesByCategory' => $technologiesByCategory,
            'skillsData' => $skillsData,
            'learningTechnologies' => $learningTechnologies,
            'bioParagraphs' => $bioParagraphs,
            'iconMapping' => $iconMapping,
            'isFeatured' => true,
        ]);
    }
}
