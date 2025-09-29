<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies','type'])->latest('id')->paginate(9);
        $allTechnologies = Technology::orderBy('name')->get();
        return view('guest.index', compact('projects', 'allTechnologies'));
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
            ->latest('id')
            ->paginate(9)
            ->withQueryString();

        $allTechnologies = Technology::orderBy('name')->get();
        return view('guest.index', [
            'projects' => $projects,
            'currentTechnology' => $technology,
            'allTechnologies' => $allTechnologies,
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
}
