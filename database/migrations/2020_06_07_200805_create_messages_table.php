<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('sender')->nullable();
            $table->string('reciever')->nullable();
            $table->string('recieveremail')->nullable();
            $table->string('scat')->nullable();
            $table->string('rcat')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->longText('msg')->nullable();
            $table->string('msgcat')->nullable();
            $table->string('msgstats')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
