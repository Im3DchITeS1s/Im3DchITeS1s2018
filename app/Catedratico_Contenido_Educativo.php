<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Catedratico_Contenido_Educativo extends Model
{
	protected $table = 'catedratico_contenido_educativo';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkformato_documento', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'archivo', 'responder'];

	public static function dataContenidoEducativoCatedratico(){
	    return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
					->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
                    ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])
                    ->where('catedratico_contenido_educativo.fkestado', 5);
   	}	

	public static function dataContenidoEducativoCatedraticoID($id){
	    return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
					->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
                    ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])
                    ->where('fkcatedratico_curso', $id)
                    ->where('catedratico_contenido_educativo.fkestado', 5);
   	} 

   	public static function contenidoParaAlumnoLoguea($responder, $fkcantidad_alumno)
   	{
   		return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
        ->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
        ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        ->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
        ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
        ->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
        ->where('catedratico_contenido_educativo.fkestado', 5)
        ->where('catedratico_contenido_educativo.responder', $responder)
        ->where('catedratico_curso.fkcantidad_alumno', $fkcantidad_alumno)
        ->select('catedratico_contenido_educativo.id as id', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'carrera.nombre as carrera', 'curso.nombre as curso', 'formato_documento.icono as icono', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.responder as responder', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.created_at as fecha')
        ->latest('catedratico_contenido_educativo.created_at')->take(30)->orderBy('catedratico_contenido_educativo.id', 'desc')->get();
   	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('catedraticocontenidoeducativo.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('catedraticocontenidoeducativo.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('catedraticocontenidoeducativo.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('catedraticocontenidoeducativo.deleted', $data);
	    });

	}   	  	
}
