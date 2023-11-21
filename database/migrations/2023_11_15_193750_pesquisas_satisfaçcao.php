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
        Schema::create('pesquisas', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('resposta1');        // oq achou da navegação em nosso site?
            $table->string('resposta2');        // o que achou da comida
            $table->string('resposta3');       //teve algum problema no dia, se sim, conte-nos
            $table->text('resposta33');     //conte-nos
            $table->string('resposta4');        //recomendaria nosso serviço para um amigo
            $table->integer('resposta5');      //em uma nota de 1/10, o quão boa foi a sua experiencia com o 4fun
            $table->text('resposta6');      //consideraçoes e opinioes finais
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesquisas');
    }
};
