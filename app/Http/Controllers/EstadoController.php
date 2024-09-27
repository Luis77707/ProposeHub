<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    // Mostrar todos los estados
    public function index()
    {
        $estados = Estado::all();
        return response()->json($estados);
    }

    // Mostrar un estado específico
    public function show($id)
    {
        $estado = Estado::findOrFail($id);
        return response()->json($estado);
    }

    // Crear un nuevo estado
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        $estado = Estado::create($request->all());
        return response()->json($estado, 201);
    }

    // Actualizar un estado existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        $estado = Estado::findOrFail($id);
        $estado->update($request->all());
        return response()->json($estado);
    }

    // Eliminar un estado
    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();
        return response()->json(null, 204);
    }
}
