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
            $table->bigInteger('tipoVehiculo')->unsigned();
            $table->date('fecha');
            $table->date('fechaI');
            $table->date('fechaS');
            $table->string('horaI');
            $table->string('horaS');
            $table->string('boleta');
            $table->string('placa');
            $table->string('color');
            $table->foreign('idCliente')
                  ->references('id')
                  ->on('clientes');
            $table->foreign('idHabitacion')
                  ->references('id')
                  ->on('habitaciones');
            $table->foreign('tipoVehiculo')
                  ->references('id')
                  ->on('tipoVehiculos');
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
