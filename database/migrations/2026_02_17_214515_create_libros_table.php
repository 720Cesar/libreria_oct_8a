<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // EJECUTAR LAS MIGRACIONES
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            // Campos a crear de la tabla en la BD
            $table->id();
            $table->string('nombre');
            $table->string('autor');
            $table->string('editorial');
            $table->double('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
