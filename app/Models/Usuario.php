<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
        'rol',
    ];

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol');
    }
}
