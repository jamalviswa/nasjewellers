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
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('jewels_type',255)->nullable();
            $table->string('dealer_name',255)->nullable();
            $table->string('mobile_number',255)->nullable();
            $table->text('address')->nullable();
            $table->string('state',255)->nullable();
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
        Schema::dropIfExists('dealers');
    }
};
