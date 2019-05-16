<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sector extends Authenticatable
{  
    protected $table = "sectores";
    protected $fillable = [
        'nombre', 'imagen', 'orden'
    ];
}
