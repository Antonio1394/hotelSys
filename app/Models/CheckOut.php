<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table='checkOut';

    protected $fillable=['idHabitacion','fecha','hora'];
}
