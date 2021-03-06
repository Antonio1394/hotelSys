<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesHabitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallesHabitacion', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('idHabitacion')->unsigned();
            $table->bigInteger('idItem')->unsigned();
            $table->integer('cantidad');
            $table->foreign('idHabitacion')
                  ->references('id')
                  ->on('habitaciones');
            $table->foreign('idItem')
                  ->references('id')
                  ->on('itemsHabitacion');
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
        Schema::drop('detallesHabitacion');
    }
}
