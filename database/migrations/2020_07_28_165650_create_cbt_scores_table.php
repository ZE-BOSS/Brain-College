<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbtScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbt_scores', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('studentid')->nullable();
            $table->string('classid')->nullable();
            $table->string('qno')->nullable();
            $table->string('subjectid')->nullable();
            $table->string('testid')->nullable();
            $table->string('questionid')->nullable();
            $table->longText('answer')->nullable();
            $table->string('mark')->nullable();
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
        Schema::dropIfExists('cbt_scores');
    }
}
