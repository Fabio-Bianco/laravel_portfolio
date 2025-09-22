<?php
// CRUD admin: accessibile SOLO agli utenti con is_admin = true
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(9);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        // Validazione base: coerente con migration e form
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url'   => 'nullable|string|max:255', // puoi aggiungere 'url' se vuoi forzare formati validi
            'link'        => 'nullable|string|max:255|url',
        ]);

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('status', 'Progetto creato con successo!');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url'   => 'nullable|string|max:255',
            'link'        => 'nullable|string|max:255|url',
        ]);

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('status', 'Progetto aggiornato!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('status', 'Progetto eliminato!');
    }
}
