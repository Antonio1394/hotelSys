<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleHabitacion extends Model
{
    protected $table='detallesHabitacion';

    protected $fillable=['idHabitacion',
                         'idItem',
                         'cantidad'];

    public $relations=['habitacion', 'itemHabitacion'];

    public function habitacion()
    {
      return $this->belongsTo('App\Models\Habitacion','idHabitacion');
    }

    public function itemHabitacion()
    {
      return $this->belongsTo('App\Models\ItemHabitacion','idItem');
    }
}
