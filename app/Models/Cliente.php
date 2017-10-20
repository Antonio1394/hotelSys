<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

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
                       ];

     public $relations = ['tipoVehiculo', 'reservacion'];

     public function tipoVehiculo()
     {
       return $this->belongsTo('App\Models\TipoVehiculo','tipoVehiculo');
     }

     public function cliente()
     {
         return $this->hasMany('App\Models\Reservacion', 'idCliente');
     }


}
