<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParPre2k extends Model
{
    protected $table = 'cat_par_pre2k';

    protected $fillable = ['id', 'par_pre', 'descripcion', 'status', 'updated_at', 'created_at' ];
}        
