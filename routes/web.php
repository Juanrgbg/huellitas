<?php

use App\Http\Controllers\CreateCountController;
use App\Http\Controllers\CreatepetsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuMascotasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('home.home');
})->name('home');

//Solo visitantes sin sesion
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/create', [CreateCountController::class, 'create'])->name('register');
    Route::post('/create', [CreateCountController::class, 'store'])->name('register.store');
});

//Solo para usuarios con sesion iniciada
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/mascotas', [MenuMascotasController::class, 'index'])->name('mascotas.index');
    Route::resource('anadirMascota', CreatepetsController::class);   
});