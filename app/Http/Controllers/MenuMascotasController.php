<?php

namespace App\Http\Controllers;

use App\Models\MenuMascotas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
    public function update(Request $request, $id)
    {
        // Busca solo entre las mascotas del usuario: si es de otra persona, da 404
        $mascota = $request->user()->mascotas()->findOrFail($id);

        $data = $request->validate([
            'nombre'      => ['required', 'string', 'max:100'],
            'especie'     => ['required', Rule::in(array_keys(MenuMascotas::ESPECIES))],
            'raza'        => ['nullable', 'string', 'max:100'],
            'edad'        => ['required', Rule::in(['Menos de 1 año', '1-3 años', '4+ años'])],
            'tamano'      => ['required', Rule::in(['Pequeño', 'Mediano', 'Grande'])],
            'sexo'        => ['required', Rule::in(['Macho', 'Hembra'])],
            'descripcion' => ['required', 'string', 'max:500'],
            'imagen'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        //Si no se subió foto nueva, no tocar la actual
        unset($data['imagen']);

        if($request->hasFile('imagen')) {
            if($mascota->imagen) {
                Storage::disk('public')->delete($mascota->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('mascotas', 'public');
        }

        $mascota->update($data);

        return redirect()->route('editpets.index')
            ->with('success', 'La publicacion de ' . $mascota->nombre . ' se actualizó correctamente. ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $mascota = $request->user()->mascotas()->findOrFail($id);

        if($mascota->imagen) {
            Storage::disk('public')->delete($mascota->imagen);
        }

        $mascota->delete();

        return redirect()->route('editpets.index')
            ->with('success', 'La publicacion se eliminó correctamente.');
    }

    public function misMascotas(Request $request)
    {
        $mascotas = $request->user()->mascotas()
            ->when($request->filled('especie'), fn ($q) => $q->where('especie', $request->especie))
            ->latest()
            ->paginate(12)
            ->withQueryString();

            return view('menu.editpets', compact('mascotas'));
    }
}
