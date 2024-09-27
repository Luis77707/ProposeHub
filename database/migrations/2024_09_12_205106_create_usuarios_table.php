<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id();  // Este debe coincidir con el tipo de dato de la clave foránea
        $table->string('nombre', 100);
        $table->string('correo', 100)->unique();
        $table->string('contraseña', 255);
        $table->foreignId('rol')->constrained('roles');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
