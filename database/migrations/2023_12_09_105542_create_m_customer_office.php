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
        Schema::create('m_customer_office', function (Blueprint $table) {
            $table->bigInteger('customer_office_id');
            $table->string('name', 50)->nullable();
            $table->string('name_kana', 100)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('fax', 12)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('corporate_number', 20)->nullable();
            $table->string('office_area', 10)->nullable();
            $table->string('office_number', 30)->nullable();
            $table->string('employment_insurance_office_number', 30)->nullable();
            $table->string('supervion_license_number', 20)->nullable();
            $table->date('permission_date')->nullable();
            $table->date('planning_period_from_date')->nullable();
            $table->date('planning_period_from_to')->nullable();
            $table->date('new_buid_date')->nullable();
            $table->date('abolition_date')->nullable();
            $table->text('jobs_comment')->nullable();
            $table->string('work_intern_area', 2)->nullable();
            $table->string('intern_prefecture', 100)->nullable();
            $table->smallInteger('audit_execution_frequency')->nullable();
            $table->string('identifying_code', 100)->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('customer_office_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_customer_office');
    }
};
