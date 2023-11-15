<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /** Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('CanceladaAgendas', function (Blueprint $table) {
             $table->id();
             $table->string('email');
             $table->string('nome');
             $table->integer('convidados');
             $table->string('pacote');
             $table->date('dia');
             $table->time('hora');
             $table->timestamps();
         });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AgendaCancelada');
    }
};

