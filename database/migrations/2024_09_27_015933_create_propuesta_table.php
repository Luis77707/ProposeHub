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
    Schema::create('propuesta', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_organizacion')->constrained('organizaciones')->onDelete('cascade')->onUpdate('cascade');
        $table->string('titulo', 200);
        $table->text('descripcion')->nullable(); // Descripción de la propuesta
        $table->text('objetivos')->nullable(); // Objetivos específicos
        $table->text('beneficios')->nullable(); // Beneficios para la empresa cliente
        $table->decimal('monto', 10, 2);
        $table->string('moneda', 3);
        $table->foreignId('id_estado')->nullable()->constrained('estados')->onDelete('set null')->onUpdate('cascade');
        $table->foreignId('id_plantilla')->nullable()->constrained('plantilla')->onDelete('set null')->onUpdate('cascade');
        $table->foreignId('id_usuario')->nullable()->constrained('usuarios')->onDelete('set null')->onUpdate('cascade');
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propuesta');
    }
};
