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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('hsn_code',6)->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('customer_type',10)->nullable();
            $table->string('customer_name',255)->nullable();
            $table->string('mobile_number',255)->nullable();
            $table->text('address')->nullable();
            $table->string('state',255)->nullable();
            $table->string('jewels_item',255)->nullable();
            $table->string('total_weight',255)->nullable();
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
        Schema::dropIfExists('billings');
    }
};
