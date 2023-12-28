<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('public_id')->default(Str::random(10));
            $table->string('carrier_name');
            $table->string('contact_name')->nullable();;
            $table->string('contact_phone')->nullable();;
            $table->string('contact_email')->nullable();;
            $table->string('driver_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->string('driver_email')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('ein_number')->nullable();
            $table->integer('number_of_service_trucks')->nullable();
            $table->string('computer_diagnostic')->nullable();
            $table->string('offers_heavy_duty_towing')->nullable();
            $table->string('offers_tire_service')->nullable();
            $table->decimal('day_service_call_rate', 8, 2)->nullable();
            $table->decimal('day_hourly_rate', 8, 2)->nullable();
            $table->decimal('day_hourly_minimum', 8, 2)->nullable();
            $table->decimal('day_drive_time_rate', 8, 2)->nullable();
            $table->decimal('night_service_call_rate', 8, 2)->nullable();
            $table->decimal('night_hourly_rate', 8, 2)->nullable();
            $table->decimal('night_hourly_minimum', 8, 2)->nullable();
            $table->decimal('night_drive_time_rate', 8, 2)->nullable();
            $table->decimal('parts_markup', 8, 2)->nullable();
            $table->decimal('additional_pricing', 8, 2)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('accounting_number')->nullable();
            $table->string('routing_number')->nullable();
            $table->boolean('information_about_parts_department')->default(false);
            $table->boolean('information_on_preferred_credit_card_processor')->default(false);
            $table->boolean('information_on_breakdown_software')->default(false);
            $table->string('signature')->nullable();
            $table->string('url_pdf')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('vendor_grade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
