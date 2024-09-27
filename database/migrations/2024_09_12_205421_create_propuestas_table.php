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
    Schema::create('propuestas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_organizacion')->constrained('organizaciones')->onDelete('cascade')->onUpdate('cascade');
        $table->string('titulo', 200);
        $table->decimal('monto', 10, 2);
        $table->string('moneda', 3);
        $table->foreignId('id_estado')->nullable()->constrained('estados')->onDelete('set null')->onUpdate('cascade'); // Asegúrate de que esto coincida con 'id' en 'estados'
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
        Schema::dropIfExists('propuestas');
    }
};
