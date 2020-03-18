<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradasActa extends Model
{
    protected $table = 'entradas_actas';

    protected $fillable = [
        'id', 'dependencia', 'almacen', 'no_acta', 'fecha_acta', 'causa_entrada', 'procedencia', 'id_cabmsgrp', 'cantidad',
         'costo_unit', 'status', 'created_at', 'updated_at' ];
}
