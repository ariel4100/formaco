<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Producto extends Authenticatable
{
    protected $table = "productos";
    protected $fillable = [
        'nombre', 'imagen', 'orden', 'link'
    ];
}
