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
        Schema::create('m_sending_agency', function (Blueprint $table) {
            $table->bigInteger('sending_agency_id');
            $table->string('representative_name', 50)->nullable();
            $table->string('representative_name_kana', 100)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('fax', 12)->nullable();
            $table->string('mail', 256)->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('created_by_id')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->bigInteger('updated_by_id')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->primary('sending_agency_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_sending_agency');
    }
};
