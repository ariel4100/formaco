<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Familia extends Authenticatable
{  
    protected $table = "familias";
    protected $fillable = [
        'nombre', 'imagen', 'orden'
    ];
}
