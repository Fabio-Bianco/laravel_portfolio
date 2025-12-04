<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\ProjectsController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ContactController;

// -------------------- GUEST --------------------

// Splash page (landing) - DISABILITATA per SEO/performance
// Future feature: riabilitare solo se necessario per personal branding
// Route::get('/', [\App\Http\Controllers\Guest\SplashController::class, 'index'])->name('splash');

// Home diretta: portfolio senza friction
Route::get('/', [ProjectsController::class, 'index'])->name('home');

// Portfolio: alias per retrocompatibilità (redirect alla home)
Route::get('/portfolio', function () {
    return redirect()->route('home', [], 301);
});


// Dettaglio progetto
Route::get('/project/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

// Filtri per tecnologia
Route::get('/technology/{technology:slug}', [ProjectsController::class, 'byTechnologySlug'])->name('projects.by-technology-slug');

// Filtri per tipo
Route::get('/type/{type:slug}', [ProjectsController::class, 'byTypeSlug'])->name('projects.by-type-slug');

// Progetti in evidenza
Route::get('/featured', [ProjectsController::class, 'featured'])->name('projects.featured');

// Contact form submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// -------------------- ADMIN (protetta) --------------------
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')->as('admin.')
    ->group(function () {
        // Dashboard -> redirect a cards
        Route::get('/', fn () => to_route('admin.projects.cards'))->name('dashboard');
        
        // Gestione progetti
        Route::get('projects/cards', [ProjectController::class, 'cards'])->name('projects.cards');
        Route::patch('projects/{project}/quick-update', [ProjectController::class, 'quickUpdate'])->name('projects.quick-update');
        
        // Tutti i progetti (debug/bulk actions)
        Route::get('projects/all', [\App\Http\Controllers\Admin\DebugController::class, 'projects'])->name('projects.all');
        Route::post('projects/bulk-publish', [\App\Http\Controllers\Admin\DebugController::class, 'bulkPublish'])->name('projects.bulk-publish');
        Route::post('projects/bulk-unpublish', [\App\Http\Controllers\Admin\DebugController::class, 'bulkUnpublish'])->name('projects.bulk-unpublish');
        Route::delete('projects/bulk-delete', [\App\Http\Controllers\Admin\DebugController::class, 'bulkDelete'])->name('projects.bulk-delete');
        
        // Resource completa progetti (per edit/create singolo)
        Route::resource('projects', ProjectController::class);
        
        // Tecnologie e Tipi
        Route::resource('technologies', TechnologyController::class);
        Route::resource('types', TypeController::class);
        
        // Import GitHub
        Route::post('import-github', [\App\Http\Controllers\Admin\ImportController::class, 'importGithub'])->name('import.github');
        
        // Profilo personale admin
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    });

// -------------------- PROFILE (protetto) --------------------
Route::middleware('auth')->group(function () {
    // Profilo utente generico (per tutti gli utenti autenticati)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Bio management
    Route::get('/bio', [ProfileController::class, 'editBio'])->name('bio.edit');
    Route::patch('/bio', [ProfileController::class, 'updateBio'])->name('bio.update');
});

// -------------------- AUTH --------------------
require __DIR__.'/auth.php';

