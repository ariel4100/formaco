<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Buscador extends Authenticatable
{
    protected $table = "buscadores";
    protected $fillable = [
        'texto', 'seccion'
    ];
}
