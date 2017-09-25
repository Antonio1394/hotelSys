<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallesOut', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('idCheck')->unsigned();
            $table->bigInteger('idItem')->unsigned();
            $table->boolean('estado');
            $table->foreign('idCheck')
                  ->references('id')
                  ->on('checkOut');
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
        Schema::drop('detallesOut');
    }
}
