<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\ProjectsController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Middleware\isAdmin;

// Home: manda alla vetrina pubblica (UX migliore per un portfolio)
Route::get('/', fn () => to_route('projects.index'))->name('home');

// ====== VETRINA PUBBLICA (GUEST) ======
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');

// ====== BACKOFFICE ADMIN ======
Route::middleware(['auth', isAdmin::class])
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Route::get('/', fn () => to_route('admin.projects.index'))->name('dashboard');
        Route::resource('projects', AdminProjectController::class);
    });


// ====== AUTENTICAZIONE (Breeze / Jetstream / Fortify) ======
require __DIR__ . '/auth.php';
