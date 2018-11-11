<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
   	protected $table = 'tipo_movimiento'; //nombre tabla
	protected $guarded = ['id']; 
	protected $fillable = ['nombre']; //guarda

}
