<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subsector extends Authenticatable
{  
    protected $table = "subsectores";
    protected $fillable = [
        'nombre', 'id_sector', 'imagen', 'orden'
    ];
}
