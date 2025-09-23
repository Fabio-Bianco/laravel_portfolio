<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\ProjectsController;
use App\Http\Controllers\Guest\CategoriesController;
use App\Http\Controllers\ProfileBioController;

// -------------------- GUEST --------------------
// Splash: pagina iniziale
Route::get('/', function () {
    if (auth()->check()) {
        return to_route('home');
    }
    return view('splash.index');
})->name('splash');

// Home: vetrina progetti (spostata su /portfolio ma mantiene il name 'home')
Route::get('/portfolio', [ProjectsController::class, 'index'])->name('home');
// Pagina elenco categorie
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
// Filtro per categoria (guest) via slug stringa, con redirect 301 da slug storici
Route::get('/portfolio/category/{slug}', [ProjectsController::class, 'byCategorySlug'])->name('projects.byCategory');


// Dettaglio progetto: ora via slug
Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

// -------------------- ADMIN (protetta) --------------------
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Route::get('/', fn () => to_route('admin.projects.index'))->name('dashboard');
        Route::resource('projects', ProjectController::class);
    });

// -------------------- PROFILO (loggati) --------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Bio Offcanvas/Page
    Route::get('/bio', [ProfileBioController::class, 'show'])->name('bio.show');
    Route::patch('/bio', [ProfileBioController::class, 'update'])->name('bio.update');
});

// -------------------- AUTH --------------------
require __DIR__.'/auth.php';
