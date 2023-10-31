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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string("descricao")->nullable();
            $table->string("imagem");
            $table->string("cor_fundo")->default("#FFFFFF");
            $table->string("cor_fonte")->default("#000000");
            $table->string("tamanho_fonte")->default("2");
            $table->string("altura")->default("30");

            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
