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
        Schema::create('s_function_category', function (Blueprint $table) {
            $table->string('category_id', 2)->primary();
            $table->string('category_name', 20)->nullable();
            $table->string('parent_category_id', 2)->nullable()->nullable();
            $table->integer('category_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_function_category');
    }
};
