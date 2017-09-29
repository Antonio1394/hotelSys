<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleHabitacion extends Model
{
    protected $table='detallesHabitacion';

    protected $fillable=['idHabitacion',
                         'idItem',
                         'cantidad'];
}
