<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned()->nullable();
                $table->foreign('bus_id')
                    ->references('id')
                    ->on('bus_detail')
                    ->onDelete('cascade');
                $table->integer('route_id')->unsigned()->nullable();
                $table->foreign('route_id')
                ->references('id')
                ->on('routes_table')
                ->onDelete('cascade');

            $table->string('status');//active/blocked
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
