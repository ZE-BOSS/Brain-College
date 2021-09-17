<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('firstname')->nullable();
            $table->string('othernames')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('disability')->nullable();
            $table->string('religion')->nullable();;
            $table->string('hobby')->nullable();
            $table->string('sport')->nullable();
            $table->string('profilepics')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneno1')->nullable();
            $table->string('phoneno2')->nullable();
            $table->string('moreinfo')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('position')->nullable();
            $table->string('category');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('lga')->nullable();
            $table->string('paymenttype')->nullable();
            $table->string('accountname')->nullable();
            $table->string('accountno')->nullable();
            $table->string('bank')->nullable();
            $table->string('paymentstatus')->nullable();
            $table->string('accountemail')->nullable();
            $table->string('stafftype')->nullable();
            $table->string('hostel')->nullable();
            $table->string('sex')->nullable();
            $table->integer('branch')->nullable();
            $table->integer('term')->nullable();
            $table->integer('session')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('time')->nullable();
            $table->string('d')->nullable();
            $table->string('m')->nullable();
            $table->string('y')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
