<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaContenido extends Model
{
	protected $table = 'contenido_visto';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido_educativo']; 
}
