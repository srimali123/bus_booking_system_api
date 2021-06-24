<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_route_id')->unsigned()->nullable();
            $table->foreign('bus_route_id')
                ->references('id')
                ->on('bus_routes')
                ->onDelete('cascade');
            $table->string('direction');//forward/revers
            $table->double('start_timestamp');
            $table->double('end_timestamp');

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
