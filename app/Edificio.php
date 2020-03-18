<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table = 'cat_edificios';

    protected $fillable = [
        'id', 'dependencia', 'nombre', 'direccion', 'status', 'updated_at', 'created_at'
    ];
}
