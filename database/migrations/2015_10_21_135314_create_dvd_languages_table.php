<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDvdLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvd_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dvd_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('dvd_id')->references('id')->on('dvds')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dvd_languages');
    }
}
