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
        // Filtri combinati da querystring: ?technology=slug&type=slug
        $technologySlug = request('technology');
        $typeSlug = request('type');

        $query = Project::with(['technologies','type'])
            ->orderByDesc('updated_at_github')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->orderByDesc('id');

            $currentTechnology = null;
            if ($technologySlug) {
                $currentTechnology = Technology::where('slug', $technologySlug)->first();
                if ($currentTechnology) {
                    $query->whereHas('technologies', fn($q) => $q->where('technologies.id', $currentTechnology->id));
                }
            }

            $currentType = null;
            if ($typeSlug) {
                $currentType = Type::where('slug', $typeSlug)->first();
                if ($currentType) {
                    $query->where('type_id', $currentType->id);
                }
            }

            $projects = $query->paginate(9)->withQueryString();

            // Liste ordinate e conteggi
            $allTechnologies = Technology::orderBy('name')->get();
            $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();

            // Contatori: numero progetti per ciascun filtro, rispettando l'altro filtro se presente
            $technologyCounts = collect();
            foreach ($allTechnologies as $tech) {
                $countQ = Project::query();
                if ($currentType) $countQ->where('type_id', $currentType->id);
                $count = $countQ->whereHas('technologies', fn($q)=>$q->where('technologies.id',$tech->id))->count();
                $technologyCounts->put($tech->id, $count);
            }

            $typeCounts = collect();
            foreach ($allTypes as $t) {
                $countQ = Project::query()->where('type_id', $t->id);
                if ($currentTechnology) {
                    $countQ->whereHas('technologies', fn($q)=>$q->where('technologies.id', $currentTechnology->id));
                }
                $typeCounts->put($t->id, $countQ->count());
            }

            return view('guest.index', [
                'projects' => $projects,
                'allTechnologies' => $allTechnologies,
                'allTypes' => $allTypes,
                'currentTechnology' => $currentTechnology,
                'currentType' => $currentType,
                'technologyCounts' => $technologyCounts,
                'typeCounts' => $typeCounts,
            ]);
    }

    public function show(Project $project)
    {
        $project->load(['technologies','type']);
        return view('guest.projects.show', compact('project'));
    }

    public function byTechnology(Technology $technology)
    {
        $projects = Project::with(['technologies','type'])
            ->whereHas('technologies', fn($q) => $q->where('technologies.id', $technology->id))
            ->orderByDesc('updated_at_github')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        $allTechnologies = Technology::orderBy('name')->get();
        $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();
        return view('guest.index', [
            'projects' => $projects,
            'currentTechnology' => $technology,
            'allTechnologies' => $allTechnologies,
            'allTypes' => $allTypes,
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
            ->where('type_id', $type->id)
            ->orderByDesc('updated_at_github')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        $allTechnologies = Technology::orderBy('name')->get();
        $allTypes = Type::orderBy('sort_order')->orderBy('name')->get();
        return view('guest.index', [
            'projects' => $projects,
            'currentType' => $type,
            'allTechnologies' => $allTechnologies,
            'allTypes' => $allTypes,
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
}
