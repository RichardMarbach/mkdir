<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDvdInfoGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvd_info_genre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dvd_info_id')->unsigned()->index();
            $table->integer('genre_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('dvd_info_id')->references('id')->on('dvd_info')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dvd_info_genre');
    }
}
