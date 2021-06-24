<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusSeates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_seates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned()->nullable();
            $table->foreign('bus_id')
                ->references('id')
                ->on('bus_detail')
                ->onDelete('cascade');
            $table->integer('seat_number');
            $table->Double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
