<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->mediumText('question')->nullable();
            $table->longText('answer')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('faqs');
    }
}
