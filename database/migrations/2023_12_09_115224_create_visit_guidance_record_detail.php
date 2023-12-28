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
        Schema::create('visit_guidance_record_detail', function (Blueprint $table) {
            $table->bigInteger('detail_id');
            $table->bigInteger('visit_record_id')->nullable();
            $table->integer('seq_no')->nullable();
            $table->date('visit_date')->nullable();
            $table->string('visit_time', 10)->nullable();
            $table->string('reflect_div', 1)->nullable();
            $table->string('training_progress', 1)->nullable();
            $table->string('training_level', 1)->nullable();
            $table->string('time_allowcation', 1)->nullable();
            $table->string('training_attitube', 1)->nullable();
            $table->string('training_willingness', 1)->nullable();
            $table->string('japanese_understanding', 1)->nullable();
            $table->string('life_attitude', 1)->nullable();
            $table->string('discipline_violation', 1)->nullable();
            $table->string('note', 200)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();

            $table->primary('detail_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_guidance_record_detail');
    }
};
