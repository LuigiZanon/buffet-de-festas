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
        Schema::create('convidados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->unique;
            $table->string('idade');
            $table->smallInteger('presente')->default(0);
            $table->unsignedBigInteger('esperagenda_id');
            $table->timestamps();
            $table->foreign('esperagenda_id')->references('id')->on('esperagendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convidados');
    }
};
