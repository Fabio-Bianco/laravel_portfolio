<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\CategorySlugRedirect;

class ProjectsController extends Controller
{
    public function index()
    {
    $projects = Project::with('categories')->latest('id')->paginate(9);
        $allCategories = Category::orderBy('name')->get();
        return view('guest.index', compact('projects', 'allCategories'));
    }

    public function show(Project $project)
    {
    $project->load('categories');
        return view('guest.projects.show', compact('project'));
    }

    public function byCategory(Category $category)
    {
        $projects = Project::with('categories')
            ->whereHas('categories', fn($q) => $q->where('categories.id', $category->id))
            ->latest('id')
            ->paginate(9)
            ->withQueryString();

        $allCategories = Category::orderBy('name')->get();
        return view('guest.index', [
            'projects' => $projects,
                'currentCategory' => $category,
            'allCategories' => $allCategories,
        ]);
    }

    public function byCategorySlug(string $slug)
    {
        // Prova slug corrente
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            // Cerca slug storico e fai redirect 301 al nuovo slug
            $redirect = CategorySlugRedirect::where('old_slug', $slug)->first();
            if ($redirect && $redirect->category) {
                return redirect()->route('projects.byCategory', $redirect->category->slug, 301);
            }
            abort(404);
        }
        return $this->byCategory($category);
    }
}
