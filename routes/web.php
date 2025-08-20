<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->get('/alumnos', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumnos.index');

Route::delete('/alumnos/{id}', [App\Http\Controllers\AlumnoController::class, 'destroy'])->name('alumnos.destroy');

require __DIR__ . '/auth.php';
