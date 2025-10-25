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
        Schema::table('registros_horarios', function (Blueprint $table) {
            
            // 1. Clave Foránea (user_id)
            // Se corrige para apuntar a la tabla 'users' (por defecto de Laravel)
            $table->foreignId('user_id')->constrained('users')->after('id');
            
            // 2. Columna 'fecha'
            $table->date('fecha')->after('user_id');
            
            // 3. Columna 'hora_entrada'
            $table->time('hora_entrada');
            
            // 4. Columna 'hora_salida'
            $table->time('hora_salida')->nullable();
        });
    }

    /**
     * Reverse the migrations (Para revertir los cambios).
     */
    public function down(): void
    {
        Schema::table('registros_horarios', function (Blueprint $table) {
            // Eliminar las claves foráneas primero
            $table->dropForeign(['user_id']);
            
            // Eliminar las columnas
            $table->dropColumn(['user_id', 'fecha', 'hora_entrada', 'hora_salida']);
        });
    }
};