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
        Schema::create('m_trainee_relative', function (Blueprint $table) {
            $table->bigInteger('relative_id');
         $table->string('relationship', 10)->nullable();
            $table->string('name', 30)->nullable();
            $table->date('birthday')->nullable();
            $table->string('nationality', 30)->nullable();
            $table->string('live_together', 1)->nullable();
            $table->string('work_school_place', 50)->nullable();
            $table->string('mobile_tel', 12)->nullable();
            $table->string('residence_card_number', 30)->nullable();
            $table->bigInteger('trainee_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('relative_id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_trainee_relative');
    }
};
