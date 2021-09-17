<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_tables', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('rand')->nullable();
            $table->string('sub_no')->nullable();
            $table->string('school_open')->nullable();
            $table->string('school_present')->nullable();
            $table->string('school_punctual')->nullable();
            $table->string('school_absent')->nullable();
            $table->string('sport_open')->nullable();
            $table->string('sport_present')->nullable();
            $table->string('sport_punctual')->nullable();
            $table->string('sport_absent')->nullable();
            $table->string('other_open')->nullable();
            $table->string('other_present')->nullable();
            $table->string('other_punctual')->nullable();
            $table->string('other_absent')->nullable();
            $table->string('loyalty')->nullable();
            $table->string('honesty')->nullable();
            $table->string('cleaniness')->nullable();
            $table->string('punctuality')->nullable();
            $table->string('regularity')->nullable();
            $table->string('conduct_comment')->nullable();
            $table->string('b_height')->nullable();
            $table->string('e_height')->nullable();
            $table->string('b_weight')->nullable();
            $table->string('e_weight')->nullable();
            $table->string('illness_no')->nullable();
            $table->string('illness_nature')->nullable();
            $table->string('t_gross_score')->nullable();
            $table->string('t_average')->nullable();
            $table->string('c_score')->nullable();
            $table->string('c_average')->nullable();
            $table->string('position')->nullable();
            $table->string('indoor_game')->nullable();
            $table->string('ball_game')->nullable();
            $table->string('combative_game')->nullable();
            $table->string('track')->nullable();
            $table->string('jumps')->nullable();
            $table->string('throw')->nullable();
            $table->string('swimming')->nullable();
            $table->string('weight_lifting')->nullable();
            $table->string('organisation')->nullable();
            $table->string('office')->nullable();
            $table->string('contribution')->nullable();
            $table->string('teacher_comment')->nullable();
            $table->string('principal_comment')->nullable();
            $table->string('shool_signature')->nullable();
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
        Schema::dropIfExists('r_tables');
    }
}
