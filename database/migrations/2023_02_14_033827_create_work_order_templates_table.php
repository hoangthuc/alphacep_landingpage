<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_order_templates', function (Blueprint $table) {
            $table->id();
            $table->string('template_name');
            $table->text('template_description')->nullable();
            $table->text('template_excerpt')->nullable();
            $table->text('service_rates')->nullable();
            $table->text('additional_fees')->nullable();
            $table->text('credit_card_authorization')->nullable();
            $table->json('template_custom_field')->nullable();
            $table->text('template_demo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_order_templates');
    }
};
