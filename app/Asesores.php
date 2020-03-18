<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesores extends Model
{
	protected $table = 'cat_asesores';

	protected $fillable = [
    'id', 'nombre', 'no_empleado', 'cargo', 'status', 'created_at', 'updated_at','id_user'
    ];
}
