<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $table='checkIn';

    protected $fillable=['idHabitacion','fecha','hora'];

    public $relations=['habitacion','detalleIn'];

    public function habitacion()
    {
      return $this->belongsTo('App\Models\Habitacion','idHabitacion');
    }

    public function detalleIn()
    {
        return $this->hasMany('App\Models\DetalleIn', 'idCheck');
    }
}
