<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryIdUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('CountryID')->on('countries');

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
        Schema::table('user_info', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
