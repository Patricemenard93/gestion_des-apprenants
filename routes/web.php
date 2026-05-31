<?php

use App\Enums\UserRole;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/formations', [PageController::class, 'formations'])->name('formations');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::middleware('role:'.UserRole::Admin->value)->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/filieres/create', [FiliereController::class, 'create'])->name('filieres.create');
        Route::post('/filieres', [FiliereController::class, 'store'])->name('filieres.store');
        Route::get('/filieres/{filiere}/edit', [FiliereController::class, 'edit'])->name('filieres.edit');
        Route::put('/filieres/{filiere}', [FiliereController::class, 'update'])->name('filieres.update');
        Route::delete('/filieres/{filiere}', [FiliereController::class, 'destroy'])->name('filieres.destroy');

        Route::get('/apprenants/create', [ApprenantController::class, 'create'])->name('apprenants.create');
        Route::post('/apprenants', [ApprenantController::class, 'store'])->name('apprenants.store');
        Route::get('/apprenants/{apprenant}/edit', [ApprenantController::class, 'edit'])->name('apprenants.edit');
        Route::put('/apprenants/{apprenant}', [ApprenantController::class, 'update'])->name('apprenants.update');
        Route::delete('/apprenants/{apprenant}', [ApprenantController::class, 'destroy'])->name('apprenants.destroy');

        Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
        Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
        Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
        Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
        Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
    });

    Route::get('/filieres', [FiliereController::class, 'index'])->name('filieres.index');
    Route::get('/filieres/{filiere}', [FiliereController::class, 'show'])->name('filieres.show');

    Route::get('/apprenants', [ApprenantController::class, 'index'])->name('apprenants.index');
    Route::get('/apprenants/{apprenant}', [ApprenantController::class, 'show'])->name('apprenants.show');

    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');

    Route::prefix('exports')->name('exports.')->group(function () {
        Route::get('/apprenants/excel', [ExportController::class, 'apprenantsExcel'])->name('apprenants.excel');
        Route::get('/apprenants/pdf', [ExportController::class, 'apprenantsPdf'])->name('apprenants.pdf');
        Route::get('/filieres/excel', [ExportController::class, 'filieresExcel'])->name('filieres.excel');
        Route::get('/filieres/pdf', [ExportController::class, 'filieresPdf'])->name('filieres.pdf');
        Route::get('/notes/excel', [ExportController::class, 'notesExcel'])->name('notes.excel');
        Route::get('/notes/pdf', [ExportController::class, 'notesPdf'])->name('notes.pdf');
    });

    Route::post('/notifications/mark-all-read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    })->name('notifications.markAllRead');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
