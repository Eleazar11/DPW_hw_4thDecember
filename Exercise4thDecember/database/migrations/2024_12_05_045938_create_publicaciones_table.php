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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 255); // Tamaño consistente
            $table->string('titulo');
            $table->string('imagen', 255)->nullable();
            $table->text('descripcion');
            $table->timestamps();
    
            $table->foreign('user_name')->references('user_name')->on('usuarios')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
