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
        Schema::create('funcionamentos', function (Blueprint $table) {
            $table->id();

            // Horário de funcionamento (das 10:00 às 22:00)
            $table->time('horarioMin');
            $table->time('horarioMax');

            // Duração de cada festa em horas
            $table->integer('horasPfesta')->default(3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionamentos');
    }
};
