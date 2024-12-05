<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/registrar_user_view', [LoginController::class, 'registrar_user_view']);
Route::get('/index_admin_view', [LoginController::class, 'index_admin_view']);

//registrar Usuario
Route::post('/registrar_usuario_db', [UsuarioController::class, 'registrar_usuario_db']);
//modificar usuario
Route::put('/actualizar_usuario/{id}', [UsuarioController::class, 'actualizar_usuario']);
//falta para eliminar
//Route::put('/actualizar_usuario/{id}', [UsuarioController::class, 'actualizar_usuario']);

//regitrar publicacion
Route::get('/registrar_publicaciones_view', [LoginController::class, 'registrar_publicaciones_view']);
Route::get('/listado_publicaciones_view', [LoginController::class, 'listado_publicaciones_view']);
Route::get('/modificar_publicaciones_view', [LoginController::class, 'modificar_publicaciones_view']);
Route::get('/eliminar_publicaciones_view', [LoginController::class, 'eliminar_publicaciones_view']);
//para comentarios
Route::get('/registrar_comentarios_view', [LoginController::class, 'registrar_comentarios_view']);
Route::get('/listado_comentarios_view', [LoginController::class, 'listado_comentarios_view']);
Route::get('/modificar_comentarios_view', [LoginController::class, 'modificar_comentarios_view']);
Route::get('/eliminar_comentarios_view', [LoginController::class, 'eliminar_comentarios_view']);

//para iniciar sesion
// Ruta para mostrar el formulario de login
Route::get('/login', function () { return view('login'); })->name('login');
// Ruta para procesar el login
Route::post('/login', [LoginController::class, 'login']);
// Ruta para el dashboard del administrador
Route::get('/admin/dashboard', function () { return view('indexAdmin'); })->name('admin.dashboard');
// Ruta para el dashboard del usuario
Route::get('/user/dashboard', function () { return view('indexUser'); })->name('user.dashboard');

//para usuarios
Route::get('/listado_usuarios_view', [LoginController::class, 'listado_usuarios_view']);
Route::get('/modificar_usuarios_view', [LoginController::class, 'modificar_usuarios_view']);
Route::get('/eliminar_usuarios_view', [LoginController::class, 'eliminar_usuarios_view']);

Route::get('/ver_usuarios_db', [UsuarioController::class, 'ver_usuarios_db']);

//publicaciones

Route::get('/registrar_publicacion', [PublicacionController::class, 'registrar_publicaciones_view']);
Route::post('/registrar_publicacion_db', [PublicacionController::class, 'registrar_publicaciones_db']);

Route::get('/ver_publicaciones', [PublicacionController::class, 'ver_publicaciones']);

Route::put('/actualizar_publicacion/{id}', [PublicacionController::class, 'actualizar_publicacion']);

//comentarios
Route::get('/registrar_comentario', [ComentarioController::class, 'registrar_comentarios_view']);
Route::post('/registrar_comentario_db', [ComentarioController::class, 'registrar_comentario_db']);

Route::get('/ver_comentarios', [ComentarioController::class, 'ver_comentarios']);

Route::put('/actualizar_comentario/{id}', [ComentarioController::class, 'actualizar_comentario']);
Route::delete('/eliminar_comentario/{id}', [ComentarioController::class, 'eliminar_comentario']);


//eliminar las publis
Route::delete('/eliminar_publicacion/{id}', [PublicacionController::class, 'eliminar_publicacion']);


