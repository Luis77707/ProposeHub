<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Propuesta;
use Illuminate\Http\Request;

class PropuestaController extends Controller
{
    // Mostrar todas las propuestas
    public function index()
    {
        $propuestas = Propuesta::all();
        return response()->json($propuestas);
    }

    // Mostrar una propuesta específica
    public function show($id)
    {
        $propuesta = Propuesta::findOrFail($id);
        return response()->json($propuesta);
    }

    // Crear una nueva propuesta
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'descripcion' => 'nullable|string',
            'objetivos' => 'nullable|string',
            'beneficios' => 'nullable|string',
            'monto' => 'required|numeric',
            'moneda' => 'required|string|max:3',
            'id_organizacion' => 'required|exists:organizaciones,id',
            'id_estado' => 'nullable|exists:estados,id',
            'id_plantilla' => 'nullable|exists:plantilla,id',
            'id_usuario' => 'nullable|exists:usuarios,id',
        ]);

        $propuesta = Propuesta::create($request->all());
        return response()->json($propuesta, 201);
    }

    // Actualizar una propuesta existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'descripcion' => 'nullable|string',
            'objetivos' => 'nullable|string',
            'beneficios' => 'nullable|string',
            'monto' => 'required|numeric',
            'moneda' => 'required|string|max:3',
            'id_organizacion' => 'required|exists:organizaciones,id',
            'id_estado' => 'nullable|exists:estados,id',
            'id_plantilla' => 'nullable|exists:plantilla,id',
            'id_usuario' => 'nullable|exists:usuarios,id',
        ]);

        $propuesta = Propuesta::findOrFail($id);
        $propuesta->update($request->all());
        return response()->json($propuesta);
    }

    // Eliminar una propuesta
    public function destroy($id)
    {
        $propuesta = Propuesta::findOrFail($id);
        $propuesta->delete();
        return response()->json(null, 204);
    }
}
