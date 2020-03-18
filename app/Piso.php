<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    protected $table = 'cat_pisos';

    protected $fillable = [

        'id', 'descripcion', 'status', 'updated_at', 'created_at'

    ];
}
