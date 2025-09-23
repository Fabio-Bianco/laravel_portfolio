<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest('id')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        $categories = Category::orderBy('name')->get();
        return view('admin.projects.create', compact('project', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $categoryIds = collect($data['categories'] ?? [])->filter()->all();
        unset($data['categories']);

        $project = Project::create($data);
        if (!empty($categoryIds)) {
            $project->categories()->sync($categoryIds);
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', "Progetto «{$project->title}» creato.");
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $project->load('categories');
        $categories = Category::orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request);
        $categoryIds = collect($data['categories'] ?? [])->filter()->all();
        unset($data['categories']);

        $project->update($data);
        $project->categories()->sync($categoryIds);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', "Progetto «{$project->title}» aggiornato.");
    }

    public function destroy(Project $project)
    {
        $title = $project->title;
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', "Progetto «{$title}» eliminato.");
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_url'   => ['nullable', 'url', 'max:255'],
            'link'        => ['nullable', 'url', 'max:255'],
            'categories'   => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
        ], [
            'title.required' => 'Il titolo è obbligatorio.',
            'image_url.url'  => "Inserisci un URL valido per l'immagine.",
            'link.url'       => 'Inserisci un URL valido per il link esterno.',
            'categories.*.exists' => 'Una delle categorie selezionate non è valida.',
        ]);
    }
}
