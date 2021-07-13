<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones_prices', function (Blueprint $table) {
            $table->bigIncrements('ZonePriceID');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('PackageID')->on('packages');
            $table->unsignedBigInteger('shipping_type_id')->nullable();
            $table->foreign('shipping_type_id')->references('id')->on('shipping_types');
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->foreign('zone_id')->references('ZoneID')->on('zones');

            $table->string('price');

            $table->softDeletes();
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
        Schema::dropIfExists('zones_prices');
    }
}
