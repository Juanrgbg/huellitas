<?php

namespace App\Http\Controllers;

use App\Models\MascotaPerdida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MascotasPerdidasController extends Controller
{
    /**
     * Mascotas perdidas publicadas (visible para todos).
     */
    public function index(Request $request)
    {
        $mascotas = MascotaPerdida::query()
            ->with('usuario')
            ->when($request->filled('especie'), fn ($q) => $q->where('especie', $request->especie))
            ->when($request->filled('estado'), fn ($q) => $q->where('estado', $request->estado))
            ->when($request->filled('buscar'), function ($q) use ($request) {
                $q->where(function ($q2) use ($request) {
                    $q2->where('nombre', 'like', '%' . $request->buscar . '%')
                        ->orWhere('raza', 'like', '%' . $request->buscar . '%')
                        ->orWhere('lugar_perdida', 'like', '%' . $request->buscar . '%');
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('perdidas.index', compact('mascotas'));
    }

    /**
     * Publicaciones del usuario (menú "Editar publicaciones").
     */
    public function mis(Request $request)
    {
        $mascotas = $request->user()->mascotasPerdidas()
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('perdidas.mis', compact('mascotas'));
    }

    /**
     * Formulario para agregar una mascota perdida.
     */
    public function create()
    {
        return view('perdidas.create');
    }

    /**
     * Guarda una nueva publicación.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->reglas(true));

        $data['imagen'] = $request->file('imagen')->store('mascotas-perdidas', 'public');
        $data['estado'] = 'Perdida';
        $data['user_id'] = $request->user()->id;

        MascotaPerdida::create($data);

        return redirect()->route('perdidas.index')
            ->with('success', 'Tu publicación de mascota perdida se creó correctamente.');
    }

    /**
     * Formulario para editar una publicación propia.
     */
    public function edit(Request $request, $id)
    {
        // Solo entre las publicaciones del usuario: si es de otra persona, da 404
        $mascota = $request->user()->mascotasPerdidas()->findOrFail($id);

        return view('perdidas.edit', compact('mascota'));
    }

    /**
     * Actualiza una publicación propia.
     */
    public function update(Request $request, $id)
    {
        $mascota = $request->user()->mascotasPerdidas()->findOrFail($id);

        $data = $request->validate($this->reglas(false));

        // Si no se subió foto nueva, no tocar la actual
        unset($data['imagen']);

        if ($request->hasFile('imagen')) {
            if ($mascota->imagen) {
                Storage::disk('public')->delete($mascota->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('mascotas-perdidas', 'public');
        }

        $mascota->update($data);

        return redirect()->route('perdidas.mis')
            ->with('success', 'La publicación de ' . $mascota->nombre . ' se actualizó correctamente.');
    }

    /**
     * Elimina una publicación propia.
     */
    public function destroy(Request $request, $id)
    {
        $mascota = $request->user()->mascotasPerdidas()->findOrFail($id);

        if ($mascota->imagen) {
            Storage::disk('public')->delete($mascota->imagen);
        }

        $mascota->delete();

        return redirect()->route('perdidas.mis')
            ->with('success', 'La publicación se eliminó correctamente.');
    }

    /**
     * Reglas de validación. En la creación la foto es obligatoria y no hay estado
     * (siempre empieza como "Perdida"); al editar la foto es opcional.
     */
    private function reglas(bool $creando): array
    {
        $reglas = [
            'nombre'        => ['required', 'string', 'max:100'],
            'especie'       => ['required', Rule::in(array_keys(MascotaPerdida::ESPECIES))],
            'raza'          => ['nullable', 'string', 'max:100'],
            'color'         => ['required', 'string', 'max:100'],
            'sexo'          => ['required', Rule::in(['Macho', 'Hembra'])],
            'fecha_perdida' => ['required', 'date', 'before_or_equal:today'],
            'lugar_perdida' => ['required', 'string', 'max:150'],
            'descripcion'   => ['required', 'string', 'max:500'],
            'imagen'        => [$creando ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ];

        if (! $creando) {
            $reglas['estado'] = ['required', Rule::in(MascotaPerdida::ESTADOS)];
        }

        return $reglas;
    }
}
