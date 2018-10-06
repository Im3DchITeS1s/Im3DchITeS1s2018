<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catedratico_Contenido_Educativo extends Model
{
	protected $table = 'catedratico_contenido_educativo';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkformato_documento', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'archivo', 'responder'];
}
