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
    Schema::create('organizaciones', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('telefono', 20)->nullable();
        $table->date('fecha')->nullable();
        $table->foreignId('id_usuario')->nullable()->constrained('usuarios')->onDelete('set null')->onUpdate('cascade');  // Permite valores NULL
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizaciones');
    }
};
