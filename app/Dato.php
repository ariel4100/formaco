<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dato extends Authenticatable
{  
    protected $table = "empresas";
    protected $fillable = [
        'tipo', 'descripcion'
    ];
}
