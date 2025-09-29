<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImportGithubProjects extends Command
{
    protected $signature = 'portfolio:import-github {username} {--include-forks} {--private} {--topics=} {--visibility=public}';
    protected $description = 'Importa repository GitHub in Project, mappando topics su Technology e impostando Type via convenzioni';

    public function handle(): int
    {
        $username = $this->argument('username');
        $includeForks = (bool) $this->option('include-forks');
        $onlyPrivate = (bool) $this->option('private');
        $topicsFilter = $this->option('topics'); // csv di topic richiesti (optional)
        $visibility = $this->option('visibility'); // public|private|all

        $token = config('services.github.token'); // opzionale

        $perPage = 100;
        $page = 1;
        $imported = 0;

        $topicsList = collect($topicsFilter ? explode(',', $topicsFilter) : [])->map(fn($t)=>trim(Str::lower($t)))->filter()->all();

        $this->info("Import da GitHub per @$username...");

        do {
            $url = "https://api.github.com/users/{$username}/repos";
            $query = [
                'per_page' => $perPage,
                'page' => $page,
                'sort' => 'updated',
                'direction' => 'desc',
                'type' => $visibility === 'all' ? 'all' : ($visibility === 'private' ? 'private' : 'public'),
            ];

            $req = Http::withHeaders([
                'Accept' => 'application/vnd.github+json',
                'X-GitHub-Api-Version' => '2022-11-28',
            ]);
            if ($token) $req = $req->withToken($token);
            $resp = $req->get($url, $query);
            if (!$resp->ok()) {
                if ($resp->status() === 403) {
                    $remaining = (string) $resp->header('X-RateLimit-Remaining');
                    $reset = $resp->header('X-RateLimit-Reset');
                    $msg = 'Errore 403 (rate limit GitHub).';
                    if ($remaining === '0' && $reset) {
                        $wait = max(0, ((int)$reset) - time());
                        $msg .= ' Attendi ~'.$wait.'s oppure configura GITHUB_TOKEN nel file .env e riprova.';
                    }
                    $this->error($msg);
                } else {
                    $this->error('Errore API GitHub: '.$resp->status());
                }
                return self::FAILURE;
            }

            $repos = $resp->json();
            if (!is_array($repos) || !count($repos)) break;

            foreach ($repos as $repo) {
                if (!$includeForks && ($repo['fork'] ?? false)) continue;
                if ($onlyPrivate && !($repo['private'] ?? false)) continue;

                // Dati principali dal listing (prima per logging)
                $title = $repo['name'] ?? 'repo';
                $description = $repo['description'] ?? '';
                $homepage = $repo['homepage'] ?? null;
                $htmlUrl = $repo['html_url'] ?? null;
                $language = $repo['language'] ?? null;

                // Recupero topics (endpoint dedicato)
                $topics = [];
                $topicResp = $req->get(($repo['url'] ?? '').'/topics');
                if ($topicResp->ok()) {
                    $topics = collect($topicResp->json()['names'] ?? [])->map(fn($t)=>Str::lower($t))->all();
                } elseif ($topicResp->status() === 403) {
                    // Rate limit sui topics: fallback a nessun topic (continua comunque)
                    $this->line('⚠ Rate limit sui topics per repo '.$title.' => continuo senza topics.');
                }

                if ($topicsList) {
                    $match = collect($topics)->intersect($topicsList)->isNotEmpty();
                    if (!$match) continue;
                }

                // Mappa language/topic -> Technology, con euristiche anche su nome/descrizione
                $techNames = collect($topics);
                if ($language) $techNames = $techNames->prepend($language);

                // Euristica: deduci tecnologie dal nome/descrizione repo
                $nameDesc = Str::of(($title ?? '').' '.($description ?? ''))->lower()->toString();
                $nameHints = collect();
                if (Str::contains($nameDesc, 'react-native')) {
                    $nameHints->push('react-native');
                }
                if (Str::contains($nameDesc, 'react')) {
                    $nameHints->push('react');
                }
                if (Str::contains($nameDesc, ['nextjs','next.js',' next '])) {
                    $nameHints->push('nextjs');
                }
                if ($nameHints->isNotEmpty()) {
                    $techNames = $techNames->merge($nameHints);
                }
                $normalizedTechNames = $techNames
                    ->map(fn($n)=>Str::of($n)->trim()->lower())
                    ->map(function ($n) {
                        $map = [
                            'js' => 'JavaScript',
                            'javascript' => 'JavaScript',
                            'ts' => 'TypeScript',
                            'typescript' => 'TypeScript',
                            'node' => 'Node.js',
                            'nodejs' => 'Node.js',
                            'node.js' => 'Node.js',
                            'php' => 'PHP',
                            'html' => 'HTML',
                            'css' => 'CSS',
                            'scss' => 'Sass',
                            'sass' => 'Sass',
                            'vue' => 'Vue.js',
                            'vuejs' => 'Vue.js',
                            'vue.js' => 'Vue.js',
                            'react' => 'React',
                            'reactjs' => 'React',
                            'react.js' => 'React',
                            'react-native' => 'React Native',
                            'reactnative' => 'React Native',
                            'next' => 'Next.js',
                            'nextjs' => 'Next.js',
                            'next.js' => 'Next.js',
                            'vitejs' => 'Vite',
                            'laravel' => 'Laravel',
                            'express' => 'Express',
                            'expressjs' => 'Express',
                            'mysql' => 'MySQL',
                            'sqlite' => 'SQLite',
                            'vite' => 'Vite',
                            'bootstrap' => 'Bootstrap',
                            'mongo' => 'MongoDB',
                            'mongodb' => 'MongoDB',
                            'prisma' => 'Prisma',
                            'tailwind' => 'Tailwind CSS',
                            'tailwindcss' => 'Tailwind CSS',
                            'postgres' => 'PostgreSQL',
                            'postgresql' => 'PostgreSQL',
                            'docker' => 'Docker',
                            'kubernetes' => 'Kubernetes',
                        ];
                        return $map[(string)$n] ?? (string)$n;
                    })
                    ->unique();

                $techIds = $normalizedTechNames
                    ->map(function ($name) {
                        $name = (string)Str::of($name)->replace(["\n","\r"], ' ')->trim();
                        // Manteniamo capitalizzazione definita nelle mappe, altrimenti Title Case semplice
                        if (!preg_match('/[A-Z]/', $name)) {
                            $name = Str::title($name);
                        }
                        $slug = Str::slug($name);
                        return Technology::firstOrCreate(['slug'=>$slug], ['name'=>$name])->id;
                    })->values()->all();

                // Mappa topic -> Type
                $type = null;
                if (in_array('frontend', $topics, true)) $type = 'Frontend';
                elseif (in_array('backend', $topics, true)) $type = 'Backend';
                elseif (in_array('automation', $topics, true) || in_array('automazioni', $topics, true)) $type = 'Automazioni';

                // Fallback: deduci Type dalle tecnologie/language
                if (!$type && !empty($normalizedTechNames)) {
                    $frontendSet = [
                        'JavaScript','Vue.js','React','HTML','CSS','Sass','Tailwind CSS','Bootstrap','Vite'
                    ];
                    $backendSet = [
                        'PHP','Laravel','Node.js','Express','MySQL','SQLite','PostgreSQL','MongoDB','Prisma','Docker','Kubernetes'
                    ];
                    $hasFrontend = collect($normalizedTechNames)->contains(fn($n) => in_array($n, $frontendSet, true));
                    $hasBackend = collect($normalizedTechNames)->contains(fn($n) => in_array($n, $backendSet, true));
                    if ($hasFrontend && !$hasBackend) {
                        $type = 'Frontend';
                    } elseif ($hasBackend && !$hasFrontend) {
                        $type = 'Backend';
                    } elseif ($hasBackend && $hasFrontend) {
                        // Preferisci Backend per full-stack semplici
                        $type = 'Backend';
                    }
                }

                // Ulteriore euristica: nome repo
                if (!$type) {
                    $nameLower = Str::lower($title);
                    if (Str::contains($nameLower, ['automation', 'automazioni', 'script'])) {
                        $type = 'Automazioni';
                    }
                }
                $typeId = null;
                if ($type) {
                    $typeId = Type::firstOrCreate(['slug'=>Str::slug($type)], ['name'=>$type,'sort_order'=>0])->id;
                }

                // Crea/aggiorna Project per html_url come chiave naturale
                $data = [
                    'title' => $title,
                    'description' => $description,
                    'github_url' => $htmlUrl,
                    'demo_url' => $homepage,
                    'link' => $homepage ?: $htmlUrl,
                    'type_id' => $typeId,
                    'image_url' => null,
                    'stargazers_count' => $repo['stargazers_count'] ?? null,
                    'forks_count' => $repo['forks_count'] ?? null,
                    'watchers_count' => $repo['watchers_count'] ?? null,
                    'updated_at_github' => isset($repo['updated_at']) ? \Carbon\Carbon::parse($repo['updated_at']) : null,
                ];

                $slugBase = Str::slug($title) ?: 'project';
                $slug = $slugBase;
                $i = 2;
                while (Project::where('slug',$slug)->where('github_url','!=',$htmlUrl)->exists()) {
                    $slug = $slugBase.'-'.$i++;
                }

                $project = Project::updateOrCreate(
                    ['github_url' => $htmlUrl],
                    array_merge($data, ['slug' => $slug])
                );

                if ($techIds) $project->technologies()->sync($techIds);

                $this->line("✔ Imported: {$project->title}");
                $imported++;
            }

            $page++;
        } while (count($repos) === $perPage);

        $this->info("Import completato. Repo importati/aggiornati: $imported");
        return self::SUCCESS;
    }
}
