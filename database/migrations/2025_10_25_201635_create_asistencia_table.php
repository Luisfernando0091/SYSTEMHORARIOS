<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar las migraciones.
     */
    public function up(): void
    {
        // 1. Crear la nueva tabla 'asistencia'
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();
            
            // user_id y foreign key
            $table->foreignId('user_id')->constrained('users'); // Apunta a 'users'
            
            // Columnas de registro de tiempo
            $table->date('fecha');      // Fecha (DATE NOT NULL)
            $table->time('hora_entrada')->nullable(); // TIME
            $table->time('hora_salida')->nullable();  // TIME (Permitimos que sea NULL al inicio)

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia');
    }
};
