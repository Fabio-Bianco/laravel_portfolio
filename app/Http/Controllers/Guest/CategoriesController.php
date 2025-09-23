<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('projects')->orderBy('name')->get();
        return view('guest.categories.index', compact('categories'));
    }
}
