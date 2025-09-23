<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileBioController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.bio', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'bio'   => ['nullable', 'string', 'max:1000'],
        ]);

        $user->fill($validated)->save();

        return back()->with('status', 'Profilo aggiornato con successo.');
    }
}
