<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('newno')->nullable();
            $table->integer('newid')->nullable();
            $table->integer('newsyll')->nullable();
            $table->integer('newclass')->nullable();
            $table->integer('term')->nullable();
            $table->integer('session')->nullable();
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
        Schema::dropIfExists('demos');
    }
}
