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
        Schema::create('project_document_attribute', function (Blueprint $table) {
            $table->bigInteger('project_document_attribute_id');
            $table->bigInteger('document_id')->nullable();
            $table->integer('seq_no')->nullable();
            $table->string('attribute_name', 100)->nullable();
            $table->string('attribute_value', 100)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();

            $table->primary('project_document_attribute_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_document_attribute');
    }
};
