<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Imagen extends Authenticatable
{  
    protected $table = "productos_imagenes";
    protected $fillable = [
        'imagen', 'id_generales', 'orden'
    ];
}
