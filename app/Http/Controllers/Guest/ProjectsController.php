<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest('id')->paginate(9);
        return view('guest.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('guest.projects.show', compact('project'));
    }
}
