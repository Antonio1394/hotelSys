<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleIn extends Model
{
    protected $table='detallesIn';

    protected $fillable=['idCheck','idItem','estado'];
}
