<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catedratico_Contenido_Educativo extends Model
{
	protected $table = 'catedratico_contenido_educativo';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkformato_documento', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'archivo', 'responder'];

	public static function dataContenidoEducativoCatedratico(){
	    return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
					->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
                    ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at']);
   	}	
}
