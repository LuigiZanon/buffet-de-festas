<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('esperagendas', function (Blueprint $table) {
                $table->id();
                $table->string('email');
                $table->string('nome');
                $table->integer('idade');
                $table->integer('convidados');
                $table->string('pacote');
                $table->datetime('Dinicio');
                $table->datetime('Dfim');
                $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('AgendaEspera');
    }
};
