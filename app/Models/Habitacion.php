<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table='habitaciones';

    protected $fillable=['noHabitacion',
                         'nivel',
                         'estado',
                         'tarifa',
                         'tarifaFinDe',
                         'tarifaPersona'
                       ];

    public $relations=['reservacion','detalleHabitacion','checkIn','checkOut'];

    public function reservacion()
    {
      return $this->hasMany('App\Models\Reservacion', 'idHabitacion');
    }

    public function detalleHabitacion()
    {
      return $this->hasMany('App\Models\DetalleHabitacion', 'idHabitacion');
    }

    public function checkIn()
    {
      return $this->hasMany('App\Models\CheckIn', 'idHabitacion');
    }

    public function checkOut()
    {
      return $this->hasMany('App\Models\CheckOut', 'idHabitacion');
    }
}
