<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    // Lista progetti (lettura)
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    // Dettaglio progetto (lettura)
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
