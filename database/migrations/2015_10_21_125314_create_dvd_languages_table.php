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
            $table->integer('dvd_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->timestamps();

            $table->primary(['dvd_id', 'language_id']);
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
