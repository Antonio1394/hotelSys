<?php

use Illuminate\Database\Seeder;
Use App\Models\Habitacion;
class HabitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i=1; $i <19 ; $i++) {
           $habitacion= new Habitacion;
           $habitacion->noHabitacion=$i;
           $habitacion->nivel=1;
           $habitacion->estado=1;
           $habitacion->tarifa=150;
           $habitacion->tarifaFinDe=200;
           $habitacion->tarifaPersona=50;
           $habitacion->save();
        }
    }
}
