<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MateriaController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

Route::get('/', function () {
    return view('welcome');
});

// Todas las rutas que requieren que el usuario esté autenticado y verificado
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Esta es la ruta a tu página de inicio (home)
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Esta es la ruta a tu dashboard (que actúa como la página de perfil)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para la gestión de alumnos
    Route::get('/alumnos', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumnos.index');
    Route::delete('/alumnos/{id}', [App\Http\Controllers\AlumnoController::class, 'destroy'])->name('alumnos.destroy');

    // Rutas para la gestión de materias
    Route::get('/materias/inscribir', [MateriaController::class, 'inscribir'])->name('materias.inscribir');
    Route::post('/materias/inscribir', [MateriaController::class, 'inscribirStore'])->name('materias.inscribir.store');

    // Rutas para la gestión del perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // **NUEVA RUTA para actualizar la foto de perfil**
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
});


require __DIR__ . '/auth.php';