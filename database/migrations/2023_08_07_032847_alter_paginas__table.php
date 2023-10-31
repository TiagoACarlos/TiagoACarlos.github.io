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
        Schema::table('paginas', function (Blueprint $table) {
            $table->foreignId('galerias_id')->nullable()->constrained('galerias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paginas', function (Blueprint $table) {
            $table->dropForeign(['galerias_id']);
            $table->dropColumn('galerias_id');
        });
    }
};
