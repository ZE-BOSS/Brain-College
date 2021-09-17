<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->nullable();
            $table->string('testid')->nullable();
            $table->string('qno')->nullable();
            $table->string('classid')->nullable();
            $table->string('subjectid')->nullable();
            $table->string('qtype')->nullable();
            $table->longText('question')->nullable();
            $table->string('opt_a')->nullable();
            $table->string('opt_b')->nullable();
            $table->string('opt_c')->nullable();
            $table->string('opt_d')->nullable();
            $table->string('correct_answer')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}
