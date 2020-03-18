<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {
	protected $table = 'users';

	protected $fillable = [
		'id', 'dependencia', 'nombre', 'usuario', 'email', 'email_verified_at', 'password', 'status', 'remember_token', 'updated_at', 'created_at', 'area', 'nivel', 'modulo', 'almacen', 'rfc',
	];
}