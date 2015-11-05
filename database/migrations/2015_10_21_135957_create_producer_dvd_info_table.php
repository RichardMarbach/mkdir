<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducerDvdInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_dvd_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producer_id')->unsigned()->index();
            $table->integer('dvd_info_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('producer_id')->references('id')->on('producers')->onDelete('cascade');
            $table->foreign('dvd_info_id')->references('id')->on('dvd_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('producer_dvd_info');
    }
}
