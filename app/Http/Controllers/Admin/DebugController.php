<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function projects()
    {
        $projects = Project::with(['type', 'technologies'])
            ->orderByDesc('created_at')
            ->get();
        
        return view('admin.debug.projects', compact('projects'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('project_ids', []);
        
        if (empty($ids)) {
            return back()->with('error', 'Nessun progetto selezionato.');
        }

        $count = Project::whereIn('id', $ids)->count();
        Project::whereIn('id', $ids)->delete();

        return back()->with('success', "Eliminati {$count} progetti.");
    }

    public function bulkPublish(Request $request)
    {
        $ids = $request->input('project_ids', []);
        
        if (empty($ids)) {
            return back()->with('error', 'Nessun progetto selezionato.');
        }

        $count = Project::whereIn('id', $ids)->update(['is_published' => true]);

        return back()->with('success', "Pubblicati {$count} progetti.");
    }

    public function bulkUnpublish(Request $request)
    {
        $ids = $request->input('project_ids', []);
        
        if (empty($ids)) {
            return back()->with('error', 'Nessun progetto selezionato.');
        }

        $count = Project::whereIn('id', $ids)->update(['is_published' => false]);

        return back()->with('success', "Nascosti {$count} progetti.");
    }
}
