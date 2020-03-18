<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabms2k extends Model
{
    protected $table = 'cat_cabms2k';

    protected $fillable = [
        'id', 'cabms', 'par_pre', 'descripcion', 'status', 'updated_at', 'created_at' ];
}
