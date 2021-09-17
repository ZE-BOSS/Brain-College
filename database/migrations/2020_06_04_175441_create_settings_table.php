<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('dash_page1')->nullable();
            $table->string('dash_page2')->nullable();
            $table->string('dash_page3')->nullable();
            $table->string('dash_wig1')->nullable();
            $table->string('dash_wig2')->nullable();
            $table->string('dash_wig3')->nullable();
            $table->integer('dash_wig4')->nullable();
            $table->string('m_attendance')->nullable();
            $table->string('m_test')->nullable();
            $table->string('m_exam')->nullable();
            $table->string('m_total')->nullable();
            $table->string('m_forward')->nullable();
            $table->string('m_average')->nullable();
            $table->string('m_grade')->nullable();
            $table->integer('term')->nullable();
            $table->integer('session')->nullable();
            $table->string('time')->nullable();
            $table->string('d')->nullable();
            $table->string('m')->nullable();
            $table->string('y')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
