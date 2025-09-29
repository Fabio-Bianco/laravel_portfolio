<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\ProjectsController;
// use App\Http\Controllers\Guest\CategoriesController; // legacy rimosso
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileBioController;
use App\Models\Type;

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
// Filtro per tipo (guest) con model binding sullo slug
Route::get('/portfolio/type/{type:slug}', [ProjectsController::class, 'byType'])->name('projects.byType');


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
        Route::post('import-github', [\App\Http\Controllers\Admin\ImportController::class, 'importGithub'])->name('import.github');
    });

// -------------------- PROFILO (loggati) --------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Bio Offcanvas/Page
    Route::get('/bio', [ProfileBioController::class, 'show'])->name('bio.show');
    Route::patch('/bio', [ProfileBioController::class, 'update'])->name('bio.update');
});

// -------------------- AUTH --------------------
require __DIR__.'/auth.php';

// -------------------- DASHBOARD (per i test Breeze) --------------------
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
