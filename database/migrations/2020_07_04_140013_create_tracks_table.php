<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
             $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('CompanyID')->on('companies');
            $table->string('current_city')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
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
        Schema::dropIfExists('tracks');
    }
}
