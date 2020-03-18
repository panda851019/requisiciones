<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
    protected $table = 'cat_procesos';

    protected $fillable = [
       'id','seccion','proceso', 'descripcion', 'status', 'updated_at', 'created_at'
    ];
}
