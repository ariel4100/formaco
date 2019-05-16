<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Calidad_descarga extends Authenticatable
{
    protected $table = "calidad_descargas";
    protected $fillable = [
        'nombre', 'ruta', 'orden'
    ];
}
