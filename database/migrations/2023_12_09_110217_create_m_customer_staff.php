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
        Schema::create('m_customer_staff', function (Blueprint $table) {
            $table->bigInteger('customer_staff_id');
            $table->string('name', 50)->nullable();
            $table->string('name_kana', 100)->nullable();
            $table->date('birthday')->nullable();
            $table->string('sex', 12)->nullable();
            $table->string('position', 20)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('customer_office_id', 100)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('certificate', 500)->nullable();
            $table->string('mail', 256)->nullable();
            $table->string('certificate_submit', 1)->nullable();
            $table->date('assignment_date')->nullable();
            $table->string('role', 2)->nullable();
            $table->string('work_condition', 1)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('customer_staff_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_customer_staff');
    }
};
