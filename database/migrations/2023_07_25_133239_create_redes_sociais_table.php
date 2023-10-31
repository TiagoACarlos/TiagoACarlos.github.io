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
        Schema::create('redes_sociais', function (Blueprint $table) {
            $table->id();
            $table->string("descricao");
            $table->string("icone");
            $table->string("link");
            $table->string("cor_texto");
            $table->string("cor_fundo");

            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_sociais');
    }
};
