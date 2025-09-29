<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('sort_order')->orderBy('name')->paginate(15);
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $type = Type::create($data);
        return redirect()->route('admin.types.index')->with('success', "Tipo «{$type->name}» creato.");
    }

    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $data = $this->validateData($request, $type->id);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $type->update($data);
        return redirect()->route('admin.types.index')->with('success', "Tipo «{$type->name}» aggiornato.");
    }

    public function destroy(Type $type)
    {
        $name = $type->name;
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', "Tipo «{$name}» eliminato.");
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        $nameRule = ['required','string','max:255','unique:types,name'];
        $slugRule = ['nullable','string','max:255','unique:types,slug'];
        if ($ignoreId) {
            $nameRule[] = 'unique:types,name,'.$ignoreId;
            $slugRule[] = 'unique:types,slug,'.$ignoreId;
        }
        return $request->validate([
            'name' => $nameRule,
            'slug' => $slugRule,
        ], [
            'name.required' => 'Il nome è obbligatorio.',
            'name.unique'   => 'Esiste già un tipo con questo nome.',
            'slug.unique'   => 'Esiste già un tipo con questo slug.',
        ]);
    }
}
