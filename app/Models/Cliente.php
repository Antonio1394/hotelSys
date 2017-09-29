<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='Clientes';

    protected $fillable=['nombre',
                         'apellido',
                         'direccion',
                         'telefono',
                         'nit',
                         'dpi',
                         'tipoVehiculo',
                         'placa',
                         'color',
                         'descuento',
                          ]
}
