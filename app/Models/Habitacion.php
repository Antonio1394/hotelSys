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
                        ]
}
