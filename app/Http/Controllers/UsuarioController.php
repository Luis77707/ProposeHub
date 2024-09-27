<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    // Registro de un nuevo usuario
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'correo' => 'required|string|email|max:100|unique:usuarios',
            'contraseña' => 'required|string|min:8',
            'rol' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña), // Encriptar la contraseña
            'rol' => $request->rol,
        ]);

        return response()->json($usuario, 201);
    }

    // Login de un usuario
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'contraseña' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !Hash::check($request->contraseña, $usuario->contraseña)) {
            return response()->json(['message' => 'Credenciales incorrectas.'], 401);
        }

        // Generar un token (puedes usar Laravel Passport o Sanctum para esto)
        $token = $usuario->createToken('token_name')->plainTextToken;

        return response()->json(['token' => $token, 'usuario' => $usuario]);
    }
}
