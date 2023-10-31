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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->text("conteudo")->nullable();
            $table->string("cor_fundo")->default("#FFFFFF");

            $table->string("imagem")->nullable();
            $table->string("lado_imagem")->default('left');
            $table->string("tamanho_imagem")->default(1); # 1 - pequena | 2 - media | 3 - grande 
            $table->integer("form_contato")->default(0); # 1 sim | 0 não 
            
            $table->string("padding_x")->default("0");
            $table->string("padding_y")->default("0");
            
            $table->foreignId('menus_id')->constrained('menus');
            $table->foreignId('cadastrado_por')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
