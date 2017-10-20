<?php

use Illuminate\Database\Seeder;
use App\Models\TipoVehiculo;
class TipoVehiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoVehiculo;
        $tipo->descripcion='Sedan';
        $tipo->save();

        $tipo = new TipoVehiculo;
        $tipo->descripcion='Camioneta';
        $tipo->save();

        $tipo = new TipoVehiculo;
        $tipo->descripcion='Pick-Up';
        $tipo->save();
    }
}
