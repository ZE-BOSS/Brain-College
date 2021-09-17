<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_subs', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('sub')->nullable();
            $table->string('subjectid')->nullable();
            $table->string('s_attendance')->nullable();
            $table->string('s_test')->nullable();
            $table->string('s_exam')->nullable();
            $table->string('s_total')->nullable();
            $table->string('s_forward')->nullable();
            $table->string('s_average')->nullable();
            $table->string('s_grade')->nullable();
            $table->string('time')->nullable()->nullable();
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
        Schema::dropIfExists('r_subs');
    }
}
