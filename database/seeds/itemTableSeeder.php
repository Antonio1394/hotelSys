<?php

use Illuminate\Database\Seeder;
use App\Models\ItemHabitacion;
class itemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item= new ItemHabitacion;
        $item->descripcion='Botella de Agua';
        $item->precio=3;
        $item->save();

        $item= new ItemHabitacion;
        $item->descripcion='Jabon';
        $item->precio=3;
        $item->save();

        $item= new ItemHabitacion;
        $item->descripcion='Shampo';
        $item->precio=5;
        $item->save();
    }
}
