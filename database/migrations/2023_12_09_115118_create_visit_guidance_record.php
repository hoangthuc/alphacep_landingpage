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
        Schema::create('visit_guidance_record', function (Blueprint $table) {
            $table->bigInteger('visit_record_id');
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('company_office_id')->nullable();
            $table->bigInteger('visit_staff_id')->nullable();
            $table->bigInteger('trainee_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();

            $table->primary('visit_record_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_guidance_record');
    }
};
