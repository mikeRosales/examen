<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
         protected $fillable = [
           
           'id_tipo',
           'descripcion',
           'paga',
           'cuota_minuto',           
        ];
}
