<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Invoice;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_item_invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Invoice::class)->nullable();
            $table->foreignIdFor(User::class,'assigne_id')->nullable();
            $table->string('name')->nullable();
            $table->string('label')->nullable();
            $table->string('unit')->nullable();
            $table->integer('qty')->default(1);
            $table->float('cost')->default(0);
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->integer('sort_order')->default(0);
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_item_invoices');
    }
};
