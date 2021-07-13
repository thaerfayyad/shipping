<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('CompanyID')->on('companies');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('MemberID')->on('members');
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
        Schema::dropIfExists('member_company');
    }
}
