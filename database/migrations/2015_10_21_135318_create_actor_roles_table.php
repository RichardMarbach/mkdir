<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actor_id')->unsigned();
            $table->integer('dvd_info_id')->unsigned();
            $table->string('character_name');
            $table->timestamps();
        });

        Schema::table('actor_roles', function (Blueprint $table) {
            $table->foreign('actor_id')
                ->references('id')->on('actors')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('dvd_info_id')
                ->references('id')->on('dvd_info')
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
        Schema::drop('actor_roles');
    }
}
