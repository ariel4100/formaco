<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Novedad extends Authenticatable
{
    protected $table = "novedades";
    protected $fillable = [
        'nombre', 'imagen_maxi', 'imagen', 'fecha', 'texto', 'ficha', 'texto_breve', 'orden', 'id_categoria'
    ];
}
