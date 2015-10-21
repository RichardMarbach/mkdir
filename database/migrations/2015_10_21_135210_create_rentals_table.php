<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('dvd_id')->unsigned();
            $table->date('start_date');
            $table->date('due_date');
            $table->date('return_date');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('dvd_id')
                ->references('id')->on('dvds')
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
        Schema::drop('rentals');
    }
}
