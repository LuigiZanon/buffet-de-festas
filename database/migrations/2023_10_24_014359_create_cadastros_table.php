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
        Schema::create('tabela_produtos', function (Blueprint $table) {
            $table->id(); // Cria uma coluna de ID automática
            $table->string('nome');
            $table->text('descricao');
            $table->decimal('preco', 8, 2);
            $table->timestamps(); // Cria colunas de created_at e updated_at para controle de data e hora
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
