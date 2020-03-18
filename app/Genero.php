<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'cat_genero';

    protected $fillable = [
        'id','descripcion', 'status','updated_at', 'created_at'
    ];

}

