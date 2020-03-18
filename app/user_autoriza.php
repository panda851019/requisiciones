<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAutoriza extends Model
{
    protected $table = 'user_autoriza';

    protected $fillable = ['id', 'dependencia', 'almacen', 'id_usuario', 'status', 'created_at', 'updated_at' ];
}

