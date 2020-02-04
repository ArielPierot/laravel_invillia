<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipto_name');
            $table->string('shipto_address');
            $table->string('shipto_city');
            $table->string('shipto_country');
            $table->unsignedBigInteger('people_id');
            $table->foreign('people_id')->references('id')->on('people');
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
        Schema::dropIfExists('ship_orders');
    }
}
