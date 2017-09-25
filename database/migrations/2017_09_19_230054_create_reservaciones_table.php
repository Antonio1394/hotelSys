<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('idCliente')->unsigned();
            $table->bigInteger('idhabitacion')->unsigned();
            $table->date('fecha');
            $table->string('horaI');
            $table->string('horaS');
            $table->string('boleta');
            $table->foreign('idCliente')
                  ->references('id')
                  ->on('clientes');
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
        Schema::drop('reservaciones');
    }
}
