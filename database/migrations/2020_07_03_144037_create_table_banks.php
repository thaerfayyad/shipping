<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBanks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_en');
            $table->string('user_account_name');
            $table->string('city');
            $table->string('account_number');
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
        Schema::dropIfExists('banks');
    }
}
