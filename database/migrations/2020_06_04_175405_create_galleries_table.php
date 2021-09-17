<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('details')->nullable();
            $table->string('link')->nullable();
            $table->string('source')->nullable();
            $table->string('category')->nullable();
            $table->integer('postid')->nullable();
            $table->string('postcat')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
