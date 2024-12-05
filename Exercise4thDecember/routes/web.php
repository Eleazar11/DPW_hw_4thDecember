<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/registrar_user_view', [LoginController::class, 'registrar_user_view']);

//registrar Usuario
Route::post('/registrar_usuario_db', [UsuarioController::class, 'registrar_usuario_db']);

//para iniciar sesion
// Ruta para mostrar el formulario de login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Ruta para procesar el login
Route::post('/login', [LoginController::class, 'login']);

// Ruta para el dashboard del administrador
Route::get('/admin/dashboard', function () {
    return view('indexAdmin');
})->name('admin.dashboard');

// Ruta para el dashboard del usuario
Route::get('/user/dashboard', function () {
    return view('indexUser');
})->name('user.dashboard');