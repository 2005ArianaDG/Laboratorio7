<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [TaskController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [TaskController::class, 'index'])->name('home');
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete']);
Route::get('/tasks/{task}/delete', [TaskController::class, 'delete']);
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
require __DIR__.'/auth.php';
