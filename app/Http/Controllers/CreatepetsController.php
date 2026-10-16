<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatepetsController extends Controller
{
    public function index()
    {
        return view('menu.anadirMascota');
    }
}
