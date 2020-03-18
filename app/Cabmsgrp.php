<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabmsgrp extends Model
{
    protected $table = 'cat_cabmsgrp';

    protected $fillable = [
        'id', 'dependencia', 'par_pre', 'cabms', 'clave_grp', 'descripcion', 'cve_unidad', 'status', 'created_at', 'updated_at' ];
}
