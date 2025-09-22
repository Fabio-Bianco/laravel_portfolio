<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(9);
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
