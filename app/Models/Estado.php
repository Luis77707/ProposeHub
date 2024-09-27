<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención (plural)
    protected $table = 'estados';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
    ];

    // Relaciones (si las necesitas, por ejemplo, con propuestas)
    public function propuestas()
    {
        return $this->hasMany(Propuesta::class, 'id_estado');
    }
}
