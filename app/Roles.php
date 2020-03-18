<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'cat_roles';

    protected $fillable = [
        'id','rol', 'descripcion', 'status'
    ];
}
