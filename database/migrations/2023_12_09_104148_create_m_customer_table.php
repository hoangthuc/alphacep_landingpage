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
        Schema::create('m_customer', function (Blueprint $table) {
            $table->bigInteger('customer_id')->primary();
            $table->string('name', 50)->nullable();
            $table->string('name_kana', 100)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('fax', 12)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('corporate_number', 20)->nullable();
            $table->string('office_area', 10)->nullable();
            $table->string('supervion_business_type', 2)->nullable();
            $table->string('supervion_license_number', 20)->nullable();
            $table->date('permission_date')->nullable();
            $table->date('planning_period_from_date')->nullable();
            $table->date('planning_period_from_to')->nullable();
            $table->date('permission_valid_from_date')->nullable();
            $table->date('permission_valid_to_date')->nullable();
            $table->string('jobs_comment', 1000)->nullable();
            $table->string('external_audit', 1)->nullable();
            $table->string('external_audit_person', 50)->nullable();
            $table->string('external_officer', 50)->nullable();
            $table->string('corporate_type', 2)->nullable();
            $table->string('overview', 1000)->nullable();
            $table->string('identifying_code', 100)->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_customer');
    }
};
