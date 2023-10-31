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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->text("conteudo")->nullable();
            $table->string("cor_fundo")->default("#FFFFFF");
            $table->string("cor_fonte")->default("#000000");
            $table->string("tamanho_fonte")->default("1");

            $table->string("padding_x")->default("0");
            $table->string("padding_y")->default("0");
            $table->string("altura_input")->default("3.5");

            $table->string("tem_redes_socias")->default("0");
            $table->string("lado_text")->default('left');
            
            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
