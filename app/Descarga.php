<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Descarga extends Authenticatable
{
    protected $table = "descargas";
    protected $fillable = [
        'nombre', 'ruta', 'orden'
    ];
}
