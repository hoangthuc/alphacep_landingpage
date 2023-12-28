<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\WorkOrderTemplate;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('public_id')->default(Str::random(10));
            $table->string('work_order_reference')->nullable();
            $table->string('carrier_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->string('driver_email')->nullable();
            $table->string('driver_name')->nullable();
            $table->foreignIdFor(WorkOrderTemplate::class);
            $table->foreignIdFor(Invoice::class)->nullable();
            $table->integer('invoice_status')->default(0);
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Location::class)->nullable();
            $table->string('dispatch_phone_number')->nullable();
            $table->string('email')->nullable();;
            $table->date('date_start')->nullable();
            $table->string('last_8_of_vin')->nullable();
            $table->integer('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('issue_with_unit')->nullable();
            $table->string('additional_notes')->nullable();
            $table->string('signed_contact_name')->nullable();
            $table->string('signed_contact_phone')->nullable();
            $table->string('signed_contact_email')->nullable();
            $table->string('signed_custom_fields')->nullable();
            $table->string('signature')->nullable();
            $table->string('url_pdf')->nullable();
            $table->string('company_name')->nullable();
            $table->tinyInteger('status')->default(0);
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
      Schema::dropIfExists('work_orders');
    }
};
