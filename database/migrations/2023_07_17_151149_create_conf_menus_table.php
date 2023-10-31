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
        Schema::create('conf_menus', function (Blueprint $table) {
            $table->id();
            $table->string("cor_fundo")->default("#FFFFFF");
            $table->string("cor_fonte")->default("#000000");
            $table->string("tamanho_fonte")->default("1");
            $table->string("tamanho_menu")->default("2");
            $table->string("posicao_menu")->default("top");
            $table->string("text_align")->default("left");
            $table->string("padding_top")->default("0");
            $table->string("padding_x")->default("2");

            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conf_menus');
    }
};
