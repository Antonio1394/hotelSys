<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    protected $table='tipoVehiculos';








    protected $fillable=['descripcion'];

    public $relations = ['cliente'];

    public function cliente()
    {
        return $this->hasMany('App\Models\Cliente', 'tipoVehiculo');
    }
}
