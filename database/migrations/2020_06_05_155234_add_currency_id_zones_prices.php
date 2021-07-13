<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrencyIdZonesPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zones_prices', function (Blueprint $table) {
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('zones_prices', function (Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropColumn('currency_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
