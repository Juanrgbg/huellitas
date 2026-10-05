<?php

use App\Http\Controllers\CreateCountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuMascotasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('home.home');
})->name('home');

Route::resource('login', LoginController::class);
Route::resource('create', CreateCountController::class);
Route::resource('mascotas', MenuMascotasController::class);