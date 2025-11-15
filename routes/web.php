<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\ProjectsController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ContactController;

// -------------------- GUEST --------------------
// Test route
Route::get('/test-minimal', fn() => view('test-minimal'))->name('test.minimal');

// Splash page (landing)
Route::get('/', [\App\Http\Controllers\Guest\SplashController::class, 'index'])->name('splash');

// Portfolio: vetrina progetti
Route::get('/portfolio', [ProjectsController::class, 'index'])->name('home');

// Dettaglio progetto
Route::get('/project/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

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

// -------------------- AUTH --------------------
require __DIR__.'/auth.php';

