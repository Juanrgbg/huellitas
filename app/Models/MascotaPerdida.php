<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MascotaPerdida extends Model
{
    protected $table = 'mascotas_perdidas';

    protected $fillable = [
        'nombre', 'especie', 'raza', 'color', 'sexo',
        'descripcion', 'lugar_perdida', 'fecha_perdida',
        'estado', 'imagen', 'user_id',
    ];

    protected $casts = [
        'fecha_perdida' => 'date',
    ];

    public const ESPECIES = [
        'Canino' => 'Caninos',
        'Felino' => 'Felinos',
        'Exótica' => 'Especies Exóticas',
    ];

    public const ESTADOS = ['Perdida', 'Encontrada'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** URL pública de la foto (o null si no tiene). */
    public function getImagenUrlAttribute(): ?string
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : null;
    }
}
