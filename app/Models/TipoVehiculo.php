<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    protected $table='tipoVehiculos';

    protected $fillable=['descripcion'];
}
