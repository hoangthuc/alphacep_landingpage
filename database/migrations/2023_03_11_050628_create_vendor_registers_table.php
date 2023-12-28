<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_registers', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->integer('number_of_service_trucks')->nullable();
            $table->decimal('day_service_call_rate', 8, 2)->nullable();
            $table->decimal('day_hourly_rate', 8, 2)->nullable();
            $table->decimal('day_hourly_minimum', 8, 2)->nullable();
            $table->decimal('day_drive_time_rate', 8, 2)->nullable();
            $table->decimal('night_service_call_rate', 8, 2)->nullable();
            $table->decimal('night_hourly_rate', 8, 2)->nullable();
            $table->decimal('night_hourly_minimum', 8, 2)->nullable();
            $table->decimal('night_drive_time_rate', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_registers');
    }
};
