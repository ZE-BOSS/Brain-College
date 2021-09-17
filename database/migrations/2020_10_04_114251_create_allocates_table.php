<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocates', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('dashboard')->nullable();
            $table->integer('event')->nullable();
            $table->integer('gallery')->nullable();
            $table->integer('class')->nullable();
            $table->integer('subject')->nullable();
            $table->integer('book')->nullable();
            $table->integer('staff')->nullable();
            $table->integer('student')->nullable();
            $table->integer('message')->nullable();
            $table->integer('payment')->nullable();
            $table->integer('trash')->nullable();
            $table->integer('assignment')->nullable();
            $table->integer('attendance')->nullable();
            $table->integer('syllabus')->nullable();
            $table->integer('hostel')->nullable();
            $table->integer('cbt')->nullable();
            $table->integer('library')->nullable();
            $table->integer('lvc')->nullable();
            $table->integer('lcc')->nullable();
            $table->integer('tutorial')->nullable();
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
        Schema::dropIfExists('allocates');
    }
}
