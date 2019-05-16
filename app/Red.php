<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Red extends Authenticatable
{  
    protected $table = "redes_sociales";
    protected $fillable = [
        'link', 'logo', 'ubicacion'
    ];
}
