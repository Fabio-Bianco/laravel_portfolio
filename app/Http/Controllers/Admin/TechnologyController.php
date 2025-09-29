<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('name')->paginate(15);
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        $technology = new Technology();
        return view('admin.technologies.create', compact('technology'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $technology = Technology::create($data);
        return redirect()->route('admin.technologies.index')->with('success', "Tecnologia «{$technology->name}» creata.");
    }

    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $data = $this->validateData($request, $technology->id);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $technology->update($data);
        return redirect()->route('admin.technologies.index')->with('success', "Tecnologia «{$technology->name}» aggiornata.");
    }

    public function destroy(Technology $technology)
    {
        $name = $technology->name;
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', "Tecnologia «{$name}» eliminata.");
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        $nameRule = ['required','string','max:255','unique:technologies,name'];
        $slugRule = ['nullable','string','max:255','unique:technologies,slug'];
        if ($ignoreId) {
            $nameRule[] = 'unique:technologies,name,'.$ignoreId;
            $slugRule[] = 'unique:technologies,slug,'.$ignoreId;
        }
        return $request->validate([
            'name' => $nameRule,
            'slug' => $slugRule,
        ], [
            'name.required' => 'Il nome è obbligatorio.',
            'name.unique'   => 'Esiste già una tecnologia con questo nome.',
            'slug.unique'   => 'Esiste già una tecnologia con questo slug.',
        ]);
    }
}
