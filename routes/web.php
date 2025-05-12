<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\RepositorioController;
use Illuminate\Support\Facades\Route;
use App\Conversations\chat;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


// ====================
// RUTAS PÚBLICAS
// ====================

Route::get('/', function () {
  return view('users.index');
})->name('inicio');

Route::get('/about', function () {
  return view('users.about');
})->name('about');


Route::get('/contact', function () {
  return view('users.contacto');
})->name('contacto');

Route::get('/login', function () {
  return view('auth.login');
})->name('login');

Route::get('/register', function () {
  return view('auth.registro');
})->name('registro');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/repository', [RepositorioController::class, 'index'])->name('repositorio');

Route::get('repository/categoria/{id}', [RepositorioController::class, 'show'])->name('repositorio.categoria');

Route::post('/contrato/generar', [ContratoController::class, 'generar'])->name('contrato.generar');

//Ruta para el chatbot
Route::match(['get', 'post'], 'chat/botman', function () {
$chat = new chat();
$chat->startConversacion();

})->name('chatbot');

// ====================
// RUTAS PRIVADAS
// ====================


Route::middleware('auth')->get('/perfil', [AdminController::class, 'perfil'])->name('perfil');

Route::middleware('auth')->get('/historial-descargas', [AdminController::class, 'index'])->name('historial.descargas');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/modificar-rol/{id}', [AdminController::class, 'modificarRol'])->name('admin.modificarRol');
    Route::post('/admin/agregar-categoria', [AdminController::class, 'agregarCategoria'])->name('admin.agregarCategoria');
    Route::post('/admin/modificar-categoria/{id}', [AdminController::class, 'modificarCategoria'])->name('admin.modificarCategoria');
    Route::post('/admin/agregar-contrato', [AdminController::class, 'agregarContrato'])->name('admin.agregarContrato');
    Route::post('/admin/modificar-contrato/{id}', [AdminController::class, 'modificarContrato'])->name('admin.modificarContrato');
});