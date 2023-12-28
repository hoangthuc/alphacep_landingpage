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
        Schema::create('m_training_facility', function (Blueprint $table) {
            $table->bigInteger('training_facility_id');
            $table->string('name', 50)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('food_expense_payment', 1)->nullable();
            $table->string('food_expense_payment_detail', 100)->nullable();
            $table->string('food_expense_trainee_charge', 1)->nullable();
            $table->string('food_expense_trainee_charge_detail', 100)->nullable();
            $table->string('food_expense_comment', 200)->nullable();
            $table->string('house_cost_payment')->nullable();
            $table->string('house_cost_payment_detail', 100)->nullable();
            $table->string('house_cost_trainee_charge', 1)->nullable();
            $table->string('house_cost_trainee_charge_detail', 100)->nullable();
            $table->string('training_place_form', 2)->nullable();
            $table->string('training_place_form_detail', 100)->nullable();
            $table->string('training_place_name', 50)->nullable();
            $table->string('training_place_tel', 12)->nullable();
            $table->string('training_place_postcode', 12)->nullable();
            $table->string('training_place_address1', 100)->nullable();
            $table->string('training_place_address2', 200)->nullable();
            $table->string('training_place_area', 5)->nullable();
            $table->string('training_place_person', 5)->nullable();
            $table->string('training_place_room_area', 5)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('training_facility_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_training_facility');
    }
};
