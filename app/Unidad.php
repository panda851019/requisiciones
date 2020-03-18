<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'cat_unidad';

    protected $fillable = [
        'id','descripcion', 'status', 'updated_at', 'created_at'
    ];
}
