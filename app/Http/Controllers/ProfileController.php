<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Pagina profilo personale (solo visualizzazione + link rapidi)
    public function show()
    {
        return view('profile.show');
    }

    // Breeze in genere fornisce già edit/update/destroy; tieni gli stub o integra i tuoi
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        // TODO: logica Breeze/tuo salvataggio profilo
        return back()->with('status', 'Profilo aggiornato.');
    }

    public function destroy(Request $request)
    {
        // TODO: logica Breeze/tuo delete + logout
        return to_route('home');
    }
}
