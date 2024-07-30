<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estancia extends Model
{
     protected $fillable = [
           'id',
           'placa',
           'id_tipo_vehiculo',
           'entrada',
           'salida',
           'cuota',
           'tiempo_estacionado'
        ];
}
