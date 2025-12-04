<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Helpers\IconHelper;
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

        $projects = $query->paginate(3)->withQueryString();

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

        return view('guest.index-minimal', [
            'projects' => $projects,
            'allTypes' => $allTypes,
            'currentType' => $currentType,
            'typeCounts' => $typeCounts,
            'technologiesByCategory' => $technologiesByCategory,
            'learningTechnologies' => $learningTechnologies,
            'bioParagraphs' => $bioParagraphs,
            'iconHelper' => new IconHelper(),
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
            'learningTechnologies' => $learningTechnologies,
            'iconHelper' => new IconHelper(),
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
            'learningTechnologies' => $learningTechnologies,
            'iconHelper' => new IconHelper(),
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
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'allTypes' => $allTypes,
            'typeCounts' => $typeCounts,
            'technologiesByCategory' => $technologiesByCategory,
            'learningTechnologies' => $learningTechnologies,
            'bioParagraphs' => $bioParagraphs,
            'iconHelper' => new IconHelper(),
            'isFeatured' => true,
        ]);
    }
}
