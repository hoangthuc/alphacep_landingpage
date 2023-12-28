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
        Schema::create('s_function', function (Blueprint $table) {
            $table->string('function_id', 3)->primary();
            $table->string('function_name', 20)->nullable();
            $table->string('category_id', 2)->nullable();
            $table->string('url', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_function');
    }
};
