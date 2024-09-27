<?php

namespace App\Http\Controllers;

use App\Models\Plantilla;
use Illuminate\Http\Request;

class PlantillaController extends Controller
{
    // Mostrar todas las plantillas
    public function index()
    {
        $plantillas = Plantilla::all();
        return response()->json($plantillas);
    }

    // Mostrar una plantilla específica
    public function show($id)
    {
        $plantilla = Plantilla::findOrFail($id);
        return response()->json($plantilla);
    }

    // Crear una nueva plantilla
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contenido' => 'nullable|string',
            'archivo_path' => 'nullable|string|max:255',
        ]);

        $plantilla = Plantilla::create($request->all());
        return response()->json($plantilla, 201);
    }

    // Actualizar una plantilla existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contenido' => 'nullable|string',
            'archivo_path' => 'nullable|string|max:255',
        ]);

        $plantilla = Plantilla::findOrFail($id);
        $plantilla->update($request->all());
        return response()->json($plantilla);
    }

    // Eliminar una plantilla
    public function destroy($id)
    {
        $plantilla = Plantilla::findOrFail($id);
        $plantilla->delete();
        return response()->json(null, 204);
    }
}
