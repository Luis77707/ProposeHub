<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención (plural)
    protected $table = 'plantilla';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'contenido',
        'archivo_path',
    ];

    // Si necesitas especificar los timestamps (creado/actualizado)
    public $timestamps = true;
}
