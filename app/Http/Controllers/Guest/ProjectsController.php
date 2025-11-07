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

        // Contatori: numero progetti per ciascun tipo
        $typeCounts = collect();
        foreach ($allTypes as $t) {
            $count = Project::published()->where('type_id', $t->id)->count();
            $typeCounts->put($t->id, $count);
        }

        return view('guest.index-minimal', [
            'projects' => $projects,
            'allTypes' => $allTypes,
            'currentType' => $currentType,
            'typeCounts' => $typeCounts,
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
        
        // Calcola i contatori
        $technologyCounts = collect();
        foreach ($allTechnologies as $tech) {
            $count = Project::published()
                ->whereHas('technologies', fn($q)=>$q->where('technologies.id',$tech->id))
                ->count();
            $technologyCounts->put($tech->id, $count);
        }

        $typeCounts = collect();
        foreach ($allTypes as $t) {
            $count = Project::published()
                ->where('type_id', $t->id)
                ->whereHas('technologies', fn($q)=>$q->where('technologies.id', $technology->id))
                ->count();
            $typeCounts->put($t->id, $count);
        }
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'currentTechnology' => $technology,
            'allTechnologies' => $allTechnologies,
            'allTypes' => $allTypes,
            'technologyCounts' => $technologyCounts,
            'typeCounts' => $typeCounts,
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
        
        // Calcola i contatori
        $typeCounts = collect();
        foreach ($allTypes as $t) {
            $count = Project::published()
                ->where('type_id', $t->id)
                ->count();
            $typeCounts->put($t->id, $count);
        }
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'currentType' => $type,
            'allTypes' => $allTypes,
            'typeCounts' => $typeCounts,
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
        
        $typeCounts = collect();
        foreach ($allTypes as $t) {
            $count = Project::published()->where('type_id', $t->id)->count();
            $typeCounts->put($t->id, $count);
        }
        
        return view('guest.index-minimal', [
            'projects' => $projects,
            'allTypes' => $allTypes,
            'typeCounts' => $typeCounts,
            'isFeatured' => true,
        ]);
    }
}
