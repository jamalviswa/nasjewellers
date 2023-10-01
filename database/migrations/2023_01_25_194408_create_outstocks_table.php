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
        Schema::create('outstocks', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number',255)->nullable();
            $table->string('customer_name',255)->nullable();
            $table->string('mobile_number',255)->nullable();
            $table->text('address')->nullable();
            $table->string('state',255)->nullable();
            $table->string('date',255)->nullable();
            $table->string('time',255)->nullable();
            $table->string('gold_rate',255)->nullable();
            $table->string('total_quantity',255)->nullable();
            $table->string('total_weight',255)->nullable();
            $table->string('total_amount',255)->nullable();
            $table->string('sgst_amount',255)->nullable();
            $table->string('cgst_amount',255)->nullable();
            $table->string('total_final_amount',255)->nullable();
            $table->enum('status',[ 'Active', 'Trash', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('outstocks');
    }
};
