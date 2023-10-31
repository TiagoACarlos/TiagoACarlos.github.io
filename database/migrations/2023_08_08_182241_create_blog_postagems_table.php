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
        Schema::create('blogs_postagens', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->text("resumo");
            $table->text("postagem");
            $table->string("imagem");

            $table->foreignId('blogs_id')->constrained('blogs');
            $table->foreignId('blogs_categorias_id')->constrained('blogs_categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_postagens');
    }
};
