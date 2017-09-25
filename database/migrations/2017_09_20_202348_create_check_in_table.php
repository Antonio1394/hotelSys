<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkIn', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('idHabitacion')->unsigned();
            $table->date('fecha');
            $table->string('hora');
            $table->foreign('idHabitacion')
                  ->references('id')
                  ->on('habitaciones');
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
        Schema::drop('checkIn');
    }
}
