<?php

use App\Http\Controllers\CreateCountController;
use App\Http\Controllers\CreatepetsController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuMascotasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('home.home');
})->name('home');

//Solo visitantes sin sesion
Route::middleware('guest')->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/create', [CreateCountController::class, 'create'])->name('register');
    Route::post('/create', [CreateCountController::class, 'store'])->name('register.store');
});

//Solo para usuarios con sesion iniciada
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/mascotas', [MenuMascotasController::class, 'index'])->name('mascotas.index');
    Route::resource('anadirMascota', CreatepetsController::class)->only(['index', 'store']);
    Route::get('/perfil', [ProfileController::class, 'profile'])->name('profile.index');
    Route::get('profileEdit', [ProfileController::class, 'edit'])->name('profile.profileEdit');
    Route::put('profileEdit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('editpets', [MenuMascotasController::class, 'update'])->name('editpets.update');
});