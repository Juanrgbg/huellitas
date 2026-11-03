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
        Schema::create('mascotas_perdidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('especie');
            $table->string('raza')->nullable();
            $table->string('color');
            $table->string('sexo');
            $table->text('descripcion');
            $table->string('lugar_perdida');
            $table->date('fecha_perdida');
            $table->string('estado')->default('Perdida');
            $table->string('imagen')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas_perdidas');
    }
};
