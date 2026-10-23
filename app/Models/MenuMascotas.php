<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuMascotas extends Model
{
    protected $fillable = [
        'nombre', 'especie', 'raza', 'edad', 'tamano',
        'sexo', 'descripcion', 'imagen', 'user_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public const ESPECIES = [
        'Canino' => 'Caninos',
        'Felino' => 'Felinos',
        'Exótica' => 'Especies Exóticas',
    ];
}
