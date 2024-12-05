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
        Schema::table('usuarios', function (Blueprint $table) {
            // Agregar la columna 'rol' con los valores 'Administrador' y 'User'
            $table->enum('rol', ['Administrador', 'User'])->default('User')->after('departamento_nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Eliminar la columna 'rol' si se revierte la migración
            $table->dropColumn('rol');
        });
    }
};
