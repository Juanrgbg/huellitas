<?php

namespace App\Http\Controllers;

use App\Models\MenuMascotas;
use Illuminate\Http\Request;

class MenuMascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.mascotas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuMascotas $menuMascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuMascotas $menuMascotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuMascotas $menuMascotas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuMascotas $menuMascotas)
    {
        //
    }
}
