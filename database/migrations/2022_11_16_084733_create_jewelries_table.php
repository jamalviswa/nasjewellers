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
        Schema::create('jewelries', function (Blueprint $table) {
            $table->id();
            $table->integer('item_name')->nullable();
            $table->string('quality_type',255)->nullable();
            $table->string('huid_number',255)->nullable();
            $table->string('gross_weight',255)->nullable();
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
        Schema::dropIfExists('jewelries');
    }
};
