<?php

use App\Http\Controllers\CreateCountController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('home.home');
})->name('home');

Route::resource('login', LoginController::class);
Route::resource('create', CreateCountController::class);