<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidaPresupuestal extends Model
{
    protected $table = 'cat_par_pre';

    protected $fillable = [
        'id', 'par_pre', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
