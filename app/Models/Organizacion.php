<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención (plural)
    protected $table = 'organizaciones';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'telefono',
        'fecha',
        'id_usuario',
    ];

    // Relaciones (si las necesitas)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
