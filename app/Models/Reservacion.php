<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table='reservaciones';
    protected $fillable=['idCliente',
                         'idHabitacion',
                         'fecha',
                         'fechaI',
                         'fechaS',
                         'horaI',
                         'horaS',
                         'boleta',
                         'estado',
                       ];

    public $relations=['cliente','habitacion'];

    public function cliente()
    {
      return $this->belongsTo('App\Models\Cliente','idHabitacion');
    }

    public function habitacion()
    {
      return $this->belongsTo('App\Models\Habitacion','idCliente');
    }
}
