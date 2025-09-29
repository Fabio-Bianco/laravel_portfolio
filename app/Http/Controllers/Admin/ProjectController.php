<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
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
    $types = Type::orderBy('sort_order')->orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();
    return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $technologyIds = collect($data['technologies'] ?? [])->filter()->all();
        unset($data['technologies']);

        $project = Project::create($data);
        if (!empty($technologyIds)) {
            $project->technologies()->sync($technologyIds);
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
    $project->load(['technologies']);
    $types = Type::orderBy('sort_order')->orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();
    return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request);
        $technologyIds = collect($data['technologies'] ?? [])->filter()->all();
        unset($data['technologies']);

        $project->update($data);
        $project->technologies()->sync($technologyIds);

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
            'github_url'  => ['nullable', 'url', 'max:255'],
            'demo_url'    => ['nullable', 'url', 'max:255'],
            'type_id'     => ['nullable', 'integer', 'exists:types,id'],
            'technologies'   => ['nullable', 'array'],
            'technologies.*' => ['integer', 'exists:technologies,id'],
        ], [
            'title.required' => 'Il titolo è obbligatorio.',
            'image_url.url'  => "Inserisci un URL valido per l'immagine.",
            'link.url'       => 'Inserisci un URL valido per il link esterno.',
            'github_url.url' => 'Inserisci un URL valido per il repository GitHub.',
            'demo_url.url'   => 'Inserisci un URL valido per la demo pubblica.',
            'type_id.exists' => 'Il tipo selezionato non è valido.',
            'technologies.*.exists' => 'Una delle tecnologie selezionate non è valida.',
        ]);
    }
}
