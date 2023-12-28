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
        Schema::create('project_trainee', function (Blueprint $table) {
            $table->bigInteger('project_trainee_id');
            $table->bigInteger('project_id')->nullable();
            $table->bigInteger('trainee_id')->nullable();
            $table->bigInteger('stay_facility_id')->nullable();
            $table->bigInteger('training_facility_id')->nullable();
            $table->bigInteger('sending_agency_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            
            $table->primary('project_trainee_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_trainee');
    }
};
