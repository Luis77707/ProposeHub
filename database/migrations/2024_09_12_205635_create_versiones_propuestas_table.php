<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('versiones_propuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_propuesta')->constrained('propuesta')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('fecha')->useCurrent();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->integer('numero_version')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versiones_propuestas');
    }
};
