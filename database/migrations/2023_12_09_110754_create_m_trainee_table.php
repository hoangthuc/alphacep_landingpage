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
        Schema::create('m_trainee', function (Blueprint $table) {
            $table->bigInteger('trainee_id');
            $table->string('alphabet_name', 50)->nullable();
            $table->string('kanji_name', 30)->nullable();
            $table->string('kana_name', 30)->nullable();
            $table->date('birthday')->nullable();
            $table->string('sex', 1)->nullable();
            $table->string('marital_div', 1)->nullable();
            $table->integer('nationality_id')->nullable();
            $table->integer('native_language_id')->nullable();
            $table->string('occupation', 50)->nullable();
            $table->string('mobile_tel', 12)->nullable();
            $table->string('birth_place', 30)->nullable();
            $table->string('home_country_address', 100)->nullable();
            $table->string('enrollment_status_div', 2)->nullable();
            $table->string('difficulty_notification_div', 1)->nullable();
            $table->date('difficulty_notification_date')->nullable();
            $table->string('disappeared_status_div', 1)->nullable();
            $table->date('disappeared_date')->nullable();
            $table->string('resumption_status_div', 1)->nullable();
            $table->date('resumption_date')->nullable();
            $table->string('trainee_type', 2)->nullable();
            $table->string('status', 2)->nullable();
            $table->text('train_history')->nullable();
            $table->date('move_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('complete_date')->nullable();
            $table->integer('sending_agency_id')->nullable();
            $table->string('apply_immigration_name', 50)->nullable();
            $table->string('update_immigration_name', 50)->nullable();
            $table->string('passport_no', 10)->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('schedule_landing_port', 100)->nullable();
            $table->string('stay_period', 10)->nullable();
            $table->string('visa_application_place', 100)->nullable();
            $table->string('entry_exit_history_div', 1)->nullable();
            $table->smallInteger('entry_exit_times')->nullable();
            $table->string('entry_exit_div', 1)->nullable();
            $table->date('entry_exit_from_date')->nullable();
            $table->date('entry_exit_to_date')->nullable();
            $table->string('residence_status', 30)->nullable();
            $table->string('residence_period', 10)->nullable();
            $table->string('residence_card_number', 12)->nullable();
            $table->date('stay_expiration_date')->nullable();
            $table->string('applicant_agent', 50)->nullable();
            $table->string('relationship_with_trainee', 30)->nullable();
            $table->string('applicant_tel', 12)->nullable();
            $table->string('applicant_postcode', 10)->nullable();
            $table->string('applicant_address1', 100)->nullable();
            $table->string('applicant_address2', 100)->nullable();
            $table->string('change_permission_apply_reason', 100)->nullable();
            $table->string('update_permission_apply_reason', 100);
            $table->string('notice_mail', 256)->nullable();
            $table->string('relatives_in_japan', 1)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('trainee_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_trainee');
    }
};
