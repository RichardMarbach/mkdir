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
            $table->integer('dvd_info_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->timestamps();

            $table->primary(['dvd_info_id', 'genre_id']);
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
