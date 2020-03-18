<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CambsTotal extends Model
{
    protected $table = 'cat_cabmstotal';

    protected $fillable = [
  		'id','cabms','par_pre','descripcion','capitulo','status','created_at','updated_at'
    ];
}
