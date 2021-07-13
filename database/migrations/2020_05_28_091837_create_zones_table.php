<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->bigIncrements('ZoneID');
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->string('origin_country_ar');
            $table->string('origin_country_en');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('CompanyID')->on('companies');
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
        Schema::dropIfExists('zones');
    }
}
