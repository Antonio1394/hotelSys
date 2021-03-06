<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemHabitacion extends Model
{
    protected $table='itemsHabitacion';

    protected $fillable=['descripcion','precio'];


    public $relations=['detalleHabitacion'];

    public function detalleHabitacion()
    {
        return $this->hasMany('App\Models\DetalleHabitacion', 'idItem');
    }
}
