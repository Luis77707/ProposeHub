<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Mostrar todos los roles
    public function index()
    {
        $roles = Rol::all();
        return response()->json($roles);
    }

    // Mostrar un rol específico
    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return response()->json($rol);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:roles',
        ]);

        $rol = Rol::create($request->all());
        return response()->json($rol, 201);
    }

    // Actualizar un rol existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre,' . $id,
        ]);

        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return response()->json($rol);
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return response()->json(null, 204);
    }
}
