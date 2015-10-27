<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dvd_info_id')->unsigned();
            $table->integer('price_id')->unsigned();
            $table->smallInteger('discount')->default(0);
            $table->smallInteger('age_restriction');
            $table->string('cover_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('dvds', function (Blueprint $table) {
            $table->foreign('dvd_info_id')
                ->references('id')->on('dvd_info')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('price_id')
                ->references('id')->on('prices')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dvds');
    }
}
