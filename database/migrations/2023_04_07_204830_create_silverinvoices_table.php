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
        Schema::create('silverinvoices', function (Blueprint $table) {
            $table->id();
            $table->integer('nonbilling_id')->nullable();
            $table->string('hsn_no',10)->nullable();
            $table->string('description',255)->nullable();
            $table->string('quantity',10)->nullable();
            $table->string('weight',255)->nullable();
            $table->string('amount',255)->nullable();
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
        Schema::dropIfExists('silverinvoices');
    }
};
