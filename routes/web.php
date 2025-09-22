<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\ProjectsController;

// -------------------- GUEST --------------------
// Home: vetrina progetti
Route::get('/', [ProjectsController::class, 'index'])->name('home');

// Dettaglio progetto (usa id: evita mismatch con slug)
Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');

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
});

// -------------------- AUTH --------------------
require __DIR__.'/auth.php';
