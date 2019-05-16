<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Metadato extends Authenticatable
{  
    protected $table = "metadatos";
    protected $fillable = [
        'seccion', 'keywords', 'description'
    ];
}
