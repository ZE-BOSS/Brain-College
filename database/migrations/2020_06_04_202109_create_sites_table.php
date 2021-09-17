<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('footer')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('linkin')->nullable();
            $table->string('admission_no_prefix')->nullable();
            $table->integer('address')->nullable();
            $table->string('phoneno')->nullable();
            $table->string('sim')->nullable();
            $table->string('sam')->nullable();
            $table->string('aboutus')->nullable();
            $table->string('tc')->nullable();
            $table->string('pp')->nullable();
            $table->string('image')->nullable();
            $table->string('simi')->nullable();
            $table->string('sami')->nullable();
            $table->string('aui')->nullable();
            $table->string('sbi')->nullable();
            $table->string('type')->nullable();
            $table->string('background')->nullable();
            $table->string('background2')->nullable();
            $table->string('cui')->nullable();
            $table->string('acc_name')->nullable();
            $table->string('acc_number')->nullable();
            $table->string('acc_bank')->nullable();
            $table->string('pay_name')->nullable();
            $table->string('pay_price')->nullable();
            $table->string('pay_discount')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
