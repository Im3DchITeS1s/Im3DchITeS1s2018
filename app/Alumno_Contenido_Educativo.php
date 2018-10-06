<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Contenido_Educativo extends Model
{
	protected $table = 'alumno_contenido_educativo';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido', 'fkestado'];
	protected $fillable = ['descripcion', 'archivo'];
}
