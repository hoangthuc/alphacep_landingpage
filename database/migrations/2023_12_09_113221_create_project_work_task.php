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
        Schema::create('project_work_task', function (Blueprint $table) {
            $table->bigInteger('task_id');
            $table->string('title', 50)->nullable();
            $table->bigInteger('project_work_id')->nullable();
            $table->integer('seq_no')->nullable();
            $table->integer('person_id')->nullable();
            $table->date('complete_limit_date')->nullable();
            $table->text('content')->nullable();
            $table->string('status', 1)->nullable();
            $table->date('complete_date')->nullable();
            $table->integer('complete_user_id')->nullable();
            $table->string('complete_user_name', 30)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();
            $table->primary('task_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_work_task');
    }
};
