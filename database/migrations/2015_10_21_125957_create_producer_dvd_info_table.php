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
            $table->integer('producer_id')->unsigned();
            $table->integer('dvd_info_id')->unsigned();
            $table->timestamps();

            $table->primary(['producer_id', 'dvd_info_id']);
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
