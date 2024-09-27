<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    use HasFactory;

    protected $table = 'propuestas';

    protected $fillable = [
        'titulo',
        'descripcion', // Agregado
        'objetivos',    // Agregado
        'beneficios',   // Agregado
        'monto',
        'moneda',
        'id_organizacion',
        'id_estado',
        'id_plantilla', // Agregado si se va a usar
        'id_usuario'
    ];

    // Relación con la tabla organizaciones
    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class, 'id_organizacion');
    }

    // Relación con la tabla estados
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    // Relación con la tabla usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relación con la tabla plantillas
    public function plantilla()
    {
        return $this->belongsTo(Plantilla::class, 'id_plantilla');
    }
}
