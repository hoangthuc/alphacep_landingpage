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
        Schema::create('s_code', function (Blueprint $table) {
            $table->string('code_id', 20)->primary();
            $table->string('code_type', 4)->nullable();
            $table->string('code_value', 100)->nullable();
            $table->string('code_text', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_code');
    }
};
