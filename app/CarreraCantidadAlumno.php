<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraCantidadAlumno extends Model
{
	protected $table = 'cantidad_alumno';
	protected $guarded = ['id', 'fkcarrera_grado', 'fkseccion', 'fkestado'];
	protected $fillable = ['cantidad'];
}
