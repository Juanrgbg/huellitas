<?php

use App\Http\Controllers\CreateCountController;
use App\Http\Controllers\CreatepetsController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotasPerdidasController;
use App\Http\Controllers\MenuMascotasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('home.home');
})->name('home');

Route::get('/quienes-somos', function () {
    return view('menu.quienesSomos');
})->name('quienesSomos');

Route::view('/manual', 'home.manual')->name('manual');

// Mascotas perdidas: el listado es publico para que cualquiera pueda ayudar
Route::get('/mascotas-perdidas', [MascotasPerdidasController::class, 'index'])->name('perdidas.index');

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
    Route::get('editpets', [MenuMascotasController::class, 'misMascotas'])->name('editpets.index');
    Route::put('mascotas/{id}', [MenuMascotasController::class, 'update'])->name('mascotas.update');
    Route::delete('mascotas/{id}', [MenuMascotasController::class, 'destroy'])->name('mascotas.destroy');

    // Mascotas perdidas: agregar, editar y eliminar publicaciones propias
    Route::get('/mascotas-perdidas/publicar', [MascotasPerdidasController::class, 'create'])->name('perdidas.create');
    Route::post('/mascotas-perdidas', [MascotasPerdidasController::class, 'store'])->name('perdidas.store');
    Route::get('/mascotas-perdidas/mis-publicaciones', [MascotasPerdidasController::class, 'mis'])->name('perdidas.mis');
    Route::get('/mascotas-perdidas/{id}/editar', [MascotasPerdidasController::class, 'edit'])->whereNumber('id')->name('perdidas.edit');
    Route::put('/mascotas-perdidas/{id}', [MascotasPerdidasController::class, 'update'])->whereNumber('id')->name('perdidas.update');
    Route::delete('/mascotas-perdidas/{id}', [MascotasPerdidasController::class, 'destroy'])->whereNumber('id')->name('perdidas.destroy');
});