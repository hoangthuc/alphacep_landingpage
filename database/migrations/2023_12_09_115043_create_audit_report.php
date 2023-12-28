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
        Schema::create('audit_report', function (Blueprint $table) {
            $table->bigInteger('audit_report_id');
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('company_office_id')->nullable();
            $table->date('audit_date')->nullable();
            $table->date('last_audit_date')->nullable();
            $table->date('next_audit_date')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->integer('updated_count')->nullable();

            $table->primary('audit_report_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_report');
    }
};
