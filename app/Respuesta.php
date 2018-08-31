<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
	protected $table = 'respuesta';
	protected $guarded = ['id', 'fkpregunta', 'fkestado'];
	protected $fillable = ['descripcion', 'validar', 'punteo', 'fecha_ingreso'];
}
