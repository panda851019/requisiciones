<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'cat_seccion';

    protected $fillable = [
        'id_seccion', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
