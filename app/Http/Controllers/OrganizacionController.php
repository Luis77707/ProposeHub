<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    // Mostrar todas las organizaciones
    public function index()
    {
        $organizaciones = Organizacion::all();
        return response()->json($organizaciones);
    }

    // Mostrar una organización específica
    public function show($id)
    {
        $organizacion = Organizacion::findOrFail($id);
        return response()->json($organizacion);
    }

    // Crear una nueva organización
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'fecha' => 'nullable|date',
            'id_usuario' => 'nullable|exists:usuarios,id',
        ]);

        $organizacion = Organizacion::create($request->all());
        return response()->json($organizacion, 201);
    }

    // Actualizar una organización existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'fecha' => 'nullable|date',
            'id_usuario' => 'nullable|exists:usuarios,id',
        ]);

        $organizacion = Organizacion::findOrFail($id);
        $organizacion->update($request->all());
        return response()->json($organizacion);
    }

    // Eliminar una organización
    public function destroy($id)
    {
        $organizacion = Organizacion::findOrFail($id);
        $organizacion->delete();
        return response()->json(null, 204);
    }
}
