<?php

use Illuminate\Database\Seeder;
use App\Models\Inventario;
class InventarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventario=new Inventario;
        $inventario->producto='Gaseosa';
        $inventario->marca='Coca Cola';
        $inventario->cantidad=50;
        $inventario->save();

        $inventario=new Inventario;
        $inventario->producto='Agua Pura';
        $inventario->marca='Cielo';
        $inventario->cantidad=50;
        $inventario->save();

        $inventario=new Inventario;
        $inventario->producto='Shampo';
        $inventario->marca='Sedal';
        $inventario->cantidad=100;
        $inventario->save();

        $inventario=new Inventario;
        $inventario->producto='Jabon';
        $inventario->marca='Protex';
        $inventario->cantidad=100;
        $inventario->save();
    }
}
