<?php

namespace App\Http\Controllers;

use App\Models\MenuMascotas;
use Illuminate\Http\Request;

class MenuMascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mascotas = MenuMascotas::query()
            ->when($request->filled('especie'), fn($q) => $q->where('especie', $request->especie))
            ->when($request->filled('buscar'), function ($q) use ($request) {
                $q->where(function ($q2) use ($request) {
                    $q2->where('nombre', 'like', '%' . $request->buscar . '%')
                        ->orWhere('raza', 'like', '%' . $request->buscar . '%');
                });
            })

        ->latest()
        ->paginate(12)
        ->withQueryString();

        return view('menu.mascotas', compact('mascotas'));
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
        $mascotas = MenuMascotas::query()
            ->when($request->filled('especie'), fn($q) => $q->where('especie', $request->especie))
            ->when($request->filled('buscar'), function ($q) use ($request) {
                $q->where(function ($q2) use ($request) {
                    $q2->where('nombre', 'like', '%' . $request->buscar . '%')
                        ->orWhere('raza', 'like', '%' . $request->buscar . '%');
                });
            })

        ->latest()
        ->paginate(12)
        ->withQueryString();

        return view('menu.editpets', compact('mascotas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuMascotas $menuMascotas)
    {
        //
    }
}
