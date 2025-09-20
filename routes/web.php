<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;            // ← pubblico (read-only)
use App\Http\Controllers\Admin\ProjectController;       // ← admin CRUD
use App\Http\Middleware\IsAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Root: guest → login; auth → profilo
Route::get('/', function () {
    return Auth::check() ? to_route('profile.show') : to_route('login');
})->name('home');

// Dashboard “intelligente”: SOLO auth
Route::get('/dashboard', function () {
    $user = Auth::user();
    return ($user && $user->is_admin)
        ? to_route('admin.dashboard')
        : to_route('profile.show');
})->middleware(['auth'])->name('dashboard');

// Profilo: SOLO auth
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ====== ROTTE PUBBLICHE (READ-ONLY) PER TUTTI GLI UTENTI LOGGATI ======
    Route::get('/projects',                [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}',      [ProjectsController::class, 'show'])->name('projects.show');
});

// ====== AREA ADMIN: CRUD COMPLETI ======
Route::middleware(['auth', IsAdmin::class])    // uso la CLASSE per evitare problemi di alias
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Route::get('/', fn () => to_route('admin.projects.index'))->name('dashboard');
        Route::resource('projects', ProjectController::class);
    });

// Breeze auth
require __DIR__ . '/auth.php';
