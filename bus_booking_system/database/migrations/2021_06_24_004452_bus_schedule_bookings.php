<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusScheduleBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedule_bookings',
            function (Blueprint $table) {
                $table->increments('id');

                $table->integer('bus_seate_id')->unsigned()->nullable();
                $table->foreign('bus_seate_id')
                    ->references('id')
                    ->on('bus_seates')
                    ->onDelete('cascade');

                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')
                    ->references('id')
                    ->on('my_users')
                    ->onDelete('cascade');

                $table->integer('bus_schedule_id')->unsigned()->nullable();
                $table->foreign('bus_schedule_id')
                    ->references('id')
                    ->on('bus_schedules')
                    ->onDelete('cascade');

                $table->integer('seat_number');
                $table->double('price');
                $table->string('status');
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
