<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table='checkOut';

    protected $fillable=['idHabitacion','fecha','hora'];

    public $relations=['habitacion','detalleOut'];

    public function habitacion()
    {
      return $this->belongsTo('App\Models\Habitacion','idHabitacion');
    }

    public function detalleOut()
    {
        return $this->hasMany('App\Models\DetalleOut', 'idCheck');
    }
}
