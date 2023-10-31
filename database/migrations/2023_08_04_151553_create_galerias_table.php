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
        Schema::create('galerias', function (Blueprint $table) {
            $table->id();
            $table->string("galeria");
            $table->string("descricao")->nullable();
            $table->string("padding")->default("0px 0px 0px 0px");
            $table->string("cor_fundo")->default("#ffffff");
            $table->string("cor_fonte_titulo")->default("#000000");
            $table->string("cor_fonte_texto")->default("#000000");
            $table->string("tamanho_fonte_titulo")->default("1");
            $table->string("tamanho_fonte_texto")->default("1");
            $table->string("grid")->default("4");
            $table->string("gap")->default("2");
            $table->string("mostrar_texto")->default("1");
            /** imagen */
            $table->string("borda")->default("0");
            $table->string("cor_borda")->default("none");
            $table->string("border_radius")->default("0% 0% 0% 0%");           
            $table->string("borda_imagem")->default("0");
            $table->string("cor_borda_imagem")->default("none");
            $table->string("padding_imagem")->default("0px 0px 0px 0px");
            $table->string("border_radius_imagem")->default("0% 0% 0% 0%");           
            $table->string("lado_text")->default("left");           
            
            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galerias');
    }
};
