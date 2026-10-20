<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $usuario = $request->user();

        return view('menu.profile', compact('usuario'));
    }



    public function edit(Request $request)
    {
        $usuario = $request->user();

        return view('profile.profileEdit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($usuario->id)],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\s()-]{7,20}$/'],
            'city' => ['nullable', 'string', 'max:100'],

        ], [
            'phone.regex' => 'El teléfono solo puede tener números, espacios y los símbolos + - ( ).',
        ]);

         // Quien entró con Google no puede cambiar el correo (es lo que lo identifica)
        if ($usuario->google_id) {
        unset($data['email']);
        }

        $usuario->update($data);

        return redirect()->route('profile.index')
        ->with('success', 'Tu perfil se actualizó correctamente.');

    }
}
