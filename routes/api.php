<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropuestaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('propuestas')->group(function () {
    // Mostrar todas las propuestas
    Route::get('/', [PropuestaController::class, 'index']);

    // Mostrar una propuesta específica
    Route::get('/{id}', [PropuestaController::class, 'show']);

    // Crear una nueva propuesta
    Route::post('/', [PropuestaController::class, 'store']);

    // Actualizar una propuesta existente
    Route::put('/{id}', [PropuestaController::class, 'update']);

    // Eliminar una propuesta
    Route::delete('/{id}', [PropuestaController::class, 'destroy']);
});
