<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleOut extends Model
{
    protected $table='detallesOut';

    protected $fillable=['idCheck','idItem','estado'];
}
