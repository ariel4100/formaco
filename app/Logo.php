<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Logo extends Authenticatable
{  
    protected $table = "logos";
    protected $fillable = [
        'ruta', 'tipo'
    ];
}
