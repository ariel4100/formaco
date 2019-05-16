<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subsector_producto extends Authenticatable
{
    protected $table = "subsector_productos";
    protected $fillable = [
        'id_producto', 'id_subsector'
    ];
}
