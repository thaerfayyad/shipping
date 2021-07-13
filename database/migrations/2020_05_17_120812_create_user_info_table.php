<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('UserInfoID');
            $table->unsignedBigInteger('UserID')->nullable();
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('gender',['male','female']);
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
        Schema::dropIfExists('user_info');
    }
}
