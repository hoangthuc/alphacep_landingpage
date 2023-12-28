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
        Schema::create('project_work_task_file', function (Blueprint $table) {
            $table->bigInteger('task_file_id');
            $table->string('file_name', 256)->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->integer('seq_no')->nullable();
            $table->binary('file_data')->nullable();
            $table->bigInteger('project_work_task_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();
            $table->primary('task_file_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_work_task_file');
    }
};
