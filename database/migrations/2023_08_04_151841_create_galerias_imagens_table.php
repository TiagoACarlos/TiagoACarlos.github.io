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
        Schema::create('galerias_imagens', function (Blueprint $table) {
            $table->id();
            $table->string("imagem");
            $table->text("titulo")->nullable();
            $table->text("descricao")->nullable();

            $table->foreignId('galerias_id')->constrained('galerias');
            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galerias_imagens');
    }
};
