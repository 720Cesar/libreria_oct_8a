<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Ruta para obtener los métodos de LibroController
    Route::resource('libros', LibroController::class);
});

// Ruta para obtener la información de un solo libro
Route::get('/libros/{id}/edit', [
    LibroController::class, 'edit'
])->name('libros.edit');

// Ruta para actualizar el libro
Route::put('/libros/{id}', [
    LibroController::class, 'update'
])->name('libros.update');

Route::post('/registro',  [
    AuthController::class, 'registerForm'
])->name('registro');

// Ruta para manejar el registro del usuario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

// Ruta para verificar el inicio de sesión
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

// Ruta para cerrar sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});

