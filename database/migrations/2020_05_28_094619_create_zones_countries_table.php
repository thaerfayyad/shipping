<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones_countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->foreign('zone_id')->references('ZoneID')->on('zones');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('zones_countries');
    }
}
