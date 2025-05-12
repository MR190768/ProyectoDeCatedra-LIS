<?php

use Illuminate\Support\Facades\Route;
use App\Conversations\chat;;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
//Vistas
Route::get('/', function () {
  return view('users.index');
})->name('inicio');

Route::get('/about', function () {
  return view('users.about');
})->name('about');

Route::get('/repository', function () {
  return view('dashboard.repositorio');
})->name('repositorio');

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
//Ruta para el cahtbot
Route::match(['get', 'post'], 'chat/botman', function () {
$chat = new chat();
$chat->startConversacion();

})->name('chatbot');
