<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\WorkOrder;
use App\Models\Location;
use App\Models\LineItemInvoice;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('public_id')->default(Str::random(10));
            $table->foreignIdFor(WorkOrder::class)->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Location::class)->nullable();
            $table->string('payer_name')->nullable();
            $table->string('payer_phone')->nullable();
            $table->string('payer_email')->nullable();
            $table->integer('workflowStatus')->nullable();
            $table->string('type')->nullable();
            $table->string('subtype')->nullable();
            $table->text('comments')->nullable();
            $table->json('files')->nullable();
            $table->float('subtotal')->nullable();
            $table->boolean('convenience_fee_disable')->default(false);
            $table->float('convenience_fee')->nullable();
            $table->float('tax_total')->nullable();
            $table->float('amount')->nullable();
            $table->text('description')->nullable();
            $table->text('payment_error')->nullable();
            $table->text('info_invoice')->nullable();
            $table->string('signature')->nullable();
            $table->string('url_pdf')->nullable();
            $table->integer('status')->default(0);
            $table->text('note_void')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
