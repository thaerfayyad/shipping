<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('PackageID');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('CompanyID')->on('companies');
            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
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
        Schema::dropIfExists('packages');
    }
}
