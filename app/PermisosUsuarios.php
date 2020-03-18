<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosUsuarios extends Model
{
    protected $table = 'permisos_usuarios';

    protected $fillable = [
        'id','user_id','seccion','proceso','status','updated_at','created_at'
    ];
}