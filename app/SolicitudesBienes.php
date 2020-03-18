<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudesBienes extends Model
{
    protected $table = 'solicitudes_bienes';

    protected $fillable = [
        'id', 'dependencia', 'almacen', 'id_folio', 'id_cabmsgrp', 'cantidad_solici', 'cantidad_entre', 'costo_unit', 'status', 'created_at', 'updated_at' 
    ];

}
