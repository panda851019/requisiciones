<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatProveedores extends Model
{
    protected $table = 'cat_proveedores';

    protected $fillable = [
         'id', 'rfc', 'tipo', 'nombre', 'curp', 'email', 'status', 'updated_at', 'created_at'
    ];
    protected $primaryKey = 'id';
}