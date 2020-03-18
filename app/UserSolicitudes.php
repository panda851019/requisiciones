<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSolicitudes extends Model
{
    protected $table = 'user_solicitudes';

    protected $fillable = ['id', 'dependencia', 'almacen', 'id_usuario', 'area_usuario', 'status', 'created_at', 'updated_at' ];
}
