<?php

namespace App\Http\Controllers;

use App\Models\MenuMascotas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreatepetsController extends Controller
{
    public function index()
    {
        return view('menu.anadirMascota');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'      => ['required', 'string', 'max:100'],
            'especie'     => ['required', Rule::in(['Canino', 'Felino', 'Exótica'])],
            'raza'        => ['nullable', 'string', 'max:100'],
            'edad'        => ['required', Rule::in(['Menos de 1 año', '1-3 años', '4+ años'])],
            'tamano'      => ['required', Rule::in(['Pequeño', 'Mediano', 'Grande'])],
            'sexo'        => ['required', Rule::in(['Macho', 'Hembra'])],
            'descripcion' => ['required', 'string', 'max:500'],
            'imagen'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        if($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('mascotas', 'public');
        }

        $data['user_id'] = $request->user()->id;

        MenuMascotas::create($data);

        return redirect()->route('mascotas.index')
            ->with('success', 'Tu mascota se publicó correctamente.');
    }
}
