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
        Schema::create('m_company_office', function (Blueprint $table) {
            $table->bigInteger('company_office_id');
            $table->string('name', 50)->nullable();
            $table->string('name_kana', 100)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('fax', 12)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('office_area', 10)->nullable();
            $table->string('office_number', 30)->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('practitioner_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('company_office_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_company_office');
    }
};
