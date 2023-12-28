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
        Schema::create('project_document', function (Blueprint $table) {
            $table->bigInteger('project_document_id');
            $table->bigInteger('project_trainee_id')->nullable();
            $table->bigInteger('document_id')->nullable();
            $table->string('document_name', 256)->nullable();
            $table->string('document_type', 2)->nullable();
            $table->string('target_doc', 2)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();

            // Primary key
            $table->primary('project_document_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_document');
    }
};
