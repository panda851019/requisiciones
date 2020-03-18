<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParPreTotal extends Model
{
    protected $table = 'cat_parpretotal';

    protected $fillable = [
  		'id','par_pre','descripcion','capitulo','status','created_at','updated_at','paaaps'
    ];
}