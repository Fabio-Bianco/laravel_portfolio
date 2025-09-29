<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ImportController extends Controller
{
    public function importGithub(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['nullable','string'],
            'visibility' => ['nullable','in:public,private,all'],
            'include_forks' => ['nullable','boolean'],
            'topics' => ['nullable','string'],
        ]);

        $username = $data['username'] ?: 'Fabio-Bianco';
        $args = [
            'username' => $username,
            '--visibility' => $data['visibility'] ?? 'public',
        ];
        if (!empty($data['include_forks'])) {
            $args['--include-forks'] = true;
        }
        if (!empty($data['topics'])) {
            $args['--topics'] = $data['topics'];
        }

        Artisan::call('portfolio:import-github', $args);
        $output = Artisan::output();

        return back()->with('status', "Import GitHub eseguito per @$username.")
            ->with('import_output', $output);
    }
}
