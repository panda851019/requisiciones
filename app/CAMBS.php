<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAMBS extends Model
{
    protected $table = 'cat_cambs';

    protected $fillable = [
        'id', 'codigo', 'par_pre', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
