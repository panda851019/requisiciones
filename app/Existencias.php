<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Existencias extends Model
{
    protected $table = 'existencias';

    protected $fillable = [
        'id', 'dependencia', 'almacen', 'id_cabmsgrp', 'existencia', 'costo_unit', 'prerorden', 'minimo', 'maximo', 'casillero' ];
}        
