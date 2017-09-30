<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleOut extends Model
{
    protected $table='detallesOut';

    protected $fillable=['idCheck','idItem','estado'];

    public $relations=['checkOut'];

    public function checkIn()
    {
      return $this->belongsTo('App\Models\CheckOut','idCheck');
    }
}
