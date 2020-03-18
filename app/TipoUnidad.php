<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
    protected $table = 'cat_unidad';

    protected $fillable = [
       'id','descripcion', 'status', 'updated_at', 'created_at'
    ];
}
