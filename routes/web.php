<?php


use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Dashboard utente (opzionale)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotte profilo utente autenticato
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Area admin
Route::middleware(['auth','verified','is_admin'])
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Route::get('/', fn () => to_route('admin.projects.index'))->name('dashboard');
        Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    });


require __DIR__.'/auth.php';


