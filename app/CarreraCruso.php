<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraCruso extends Model
{
	protected $table = 'carrera_curso';
	protected $guarded = ['id', 'fkcarrera', 'fkcurso', 'fkestado'];
}
