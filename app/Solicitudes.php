<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'id', 'dependencia', 'almacen', 'fecha', 'folio', 'id_usersolicita', 'id_userautoriza', 'fecha_entrega', 'fecha_autoriza', 
        'recibe', 'area_enlace', 'status_sol', 'status', 'created_at', 'updated_at' 
        ];
}
