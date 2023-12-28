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
        Schema::create('project_trainee_contract', function (Blueprint $table) {
            $table->bigInteger('contract_id');
            $table->bigInteger('project_trainee_id')->nullable();
            $table->bigInteger('training_office_id')->nullable();
            $table->bigInteger('practitioner_group_id')->nullable();
            $table->string('work_place_name', 100)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->integer('transition_occupation_id1')->nullable();
            $table->integer('transition_occupation_id2')->nullable();
            $table->integer('transition_occupation_id3')->nullable();
            $table->string('other_transition_occupation', 100)->nullable();
            $table->string('schedule_entry_date_div', 1)->nullable();
            $table->date('schedule_entry_date')->nullable();
            $table->string('entry_date_div', 1)->nullable();
            $table->date('entry_date')->nullable();
            $table->string('no3_entry_date_div', 1)->nullable();
            $table->date('no3_entry_date')->nullable();
            $table->string('schedule_return_date_div', 1)->nullable();
            $table->date('schedule_return_from_date')->nullable();
            $table->date('schedule_return_to_date')->nullable();
            $table->string('pre_entry_training')->nullable();
            $table->string('post_entry_training_div', 1)->nullable();
            $table->date('post_entry_training_from_date')->nullable();
            $table->date('post_entry_training_from_to')->nullable();
            $table->string('training_no1_certification_date_div', 1)->nullable();
            $table->date('training_no1_certification_date')->nullable();
            $table->string('training_no1_certification_number', 20)->nullable();
            $table->string('training_no1_practition_date_div')->nullable();
            $table->date('training_no1_practition_from_date')->nullable();
            $table->date('training_no1_practition_to_date')->nullable();
            $table->text('training_no1_note')->nullable();
            $table->string('training_no2_certification_date_div', 1)->nullable();
            $table->date('training_no2_certification_date')->nullable();
            $table->string('training_no2_certification_number', 20)->nullable();
            $table->string('training_no2_practition_date_div')->nullable();
            $table->date('training_no2_practition_from_date')->nullable();
            $table->date('training_no2_practition_to_date')->nullable();
            $table->text('training_no2_note')->nullable();
            $table->string('training_no3_certification_date_div', 1)->nullable();
            $table->date('training_no3_certification_date')->nullable();
            $table->string('training_no3_certification_number', 20)->nullable();
            $table->string('training_no3_practition_date_div')->nullable();
            $table->date('training_no3_practition_from_date')->nullable();
            $table->date('training_no3_practition_to_date')->nullable();
            $table->text('training_no3_note')->nullable();
            $table->string('fixed_term_employment_contract')->nullable();
            $table->date('employment_contract_from_date')->nullable();
            $table->date('employment_contract_from_to')->nullable();
            $table->date('work_hours_div')->nullable();
            $table->smallInteger('work_days_1_year')->nullable();
            $table->smallInteger('work_days_2_year')->nullable();
            $table->smallInteger('work_days_3_year')->nullable();
            $table->smallInteger('work_days_4_year')->nullable();
            $table->smallInteger('work_days_5_year')->nullable();
            $table->smallInteger('holiday_days')->nullable();
            $table->string('work_hours_per_day', 20)->nullable();
            $table->string('work_hours_per_week', 20)->nullable();
            $table->string('work_hours_per_week_decimal_notation', 5)->nullable();
            $table->string('work_hours_per_month', 20)->nullable();
            $table->string('work_hours_per_month_decimal_notation', 5)->nullable();
            $table->string('work_hours_per_year', 20)->nullable();
            $table->string('work_hours_per_year_decimal_notation', 5)->nullable();
            $table->smallInteger('post_entry_training_hours')->nullable();
            $table->float('training_no1_hours')->nullable();
            $table->float('training_no2_hours')->nullable();
            $table->float('training_no3_hours')->nullable();
            $table->string('training_span_period')->nullable();
            $table->decimal('training_no1_basic_salary_for_month', 10, 0)->nullable();
            $table->decimal('training_no1_basic_salary_for_day', 10, 0)->nullable();
            $table->decimal('training_no1_basic_salary_for_hour', 10, 0)->nullable();
            $table->decimal('training_no2_basic_salary_for_month', 10, 0)->nullable();
            $table->decimal('training_no2_basic_salary_for_day', 10, 0)->nullable();
            $table->decimal('training_no2_basic_salary_for_hour', 10, 0)->nullable();
            $table->decimal('training_no3_basic_salary_for_month', 10, 0)->nullable();
            $table->decimal('training_no3_basic_salary_for_day', 10, 0)->nullable();
            $table->decimal('training_no3_basic_salary_for_hour', 10, 0)->nullable();
            $table->decimal('comuting_allowance', 10, 0)->nullable();
            $table->decimal('approx_amount', 10, 0)->nullable();
            $table->string('food_expense_div')->nullable();
            $table->decimal('food_expense_amount', 10, 0)->nullable();
            $table->decimal('house_expense_amount', 10, 0)->nullable();
            $table->string('accommodation_type', 2)->nullable();
            $table->string('light_heat_fee_div')->nullable();
            $table->decimal('light_heat_fee', 10, 0)->nullable();
            $table->decimal('other_amount', 10, 0)->nullable();

            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();

            $table->primary('contract_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_trainee_contract');
    }
};
