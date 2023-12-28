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
        Schema::create('m_working_hour', function (Blueprint $table) {
            $table->bigInteger('working_hour_id');
            $table->string('working_hour_from', 10)->nullable();
            $table->string('working_hour_to', 10)->nullable();
            $table->string('rest_time_from', 10)->nullable();
            $table->string('rest_time_to', 10)->nullable();
            $table->string('rest_time_from_2', 10)->nullable();
            $table->string('rest_time_to_2', 10)->nullable();
            $table->string('rest_time_from_3', 10)->nullable();
            $table->string('rest_time_to_3', 10)->nullable();
            $table->integer('rest_hour')->nullable();
            $table->string('work_overtime', 1)->nullable();
            $table->string('holiday_plan', 30)->nullable();
            $table->string('working_hour_comment', 350)->nullable();
            $table->integer('working_condition')->nullable();
            $table->integer('yearly_give')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();
            $table->primary('working_hour_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_working_hour');
    }
};
