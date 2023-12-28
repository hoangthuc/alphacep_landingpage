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
        Schema::create('m_stay_facility', function (Blueprint $table) {
            $table->bigInteger('stay_facility_id');
            $table->string('name', 50)->nullable();
            $table->string('stay_facility_form_div', 2)->nullable();
            $table->string('stay_facility_form_detail', 50)->nullable();
            $table->string('contributor_div', 2)->nullable();
            $table->string('contributor_name', 50)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('total_area', 5)->nullable();
            $table->string('trainee_number', 5)->nullable();
            $table->string('house_density', 5)->nullable();
            $table->string('trainee_charge_detail', 200)->nullable();
            $table->string('other_note', 200)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();
            $table->primary('stay_facility_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_stay_facility');
    }
};
