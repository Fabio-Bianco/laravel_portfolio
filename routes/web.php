<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\ProjectsController;
// use App\Http\Controllers\Guest\CategoriesController; // legacy rimosso
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
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
// Filtro per tecnologia (guest) con model binding sullo slug
Route::get('/portfolio/technology/{technology:slug}', [ProjectsController::class, 'byTechnology'])->name('projects.byTechnology');


// Dettaglio progetto: ora via slug
Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

// -------------------- ADMIN (protetta) --------------------
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Route::get('/', fn () => to_route('admin.projects.index'))->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::resource('technologies', TechnologyController::class);
        Route::resource('types', TypeController::class);
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
