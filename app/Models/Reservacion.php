<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table='reservaciones';
    protected $fillable=['idCliente',
                         'idHabitacion',
                         'fecha',
                         'horaI',
                         'horaS',
                         'boleta',
                        ]
}
