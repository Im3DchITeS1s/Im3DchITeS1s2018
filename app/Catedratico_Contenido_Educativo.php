<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Event;

class Catedratico_Contenido_Educativo extends Model
{
	protected $table = 'catedratico_contenido_educativo';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkformato_documento', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'archivo', 'responder', 'anio'];

	public static function dataContenidoEducativoCatedratico($fkpersona){
	    return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
					->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
                    ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])
                    ->where('catedratico_contenido_educativo.fkestado', 5)
                    ->where('catedratico_curso.fkpersona', $fkpersona)
                    ->where('catedratico_contenido_educativo.anio', date('Y'));
   	}	

	public static function dataContenidoAlumnoLogueado(){
	    return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
	    	->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
	    	->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
	    	->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
	    	->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
	    	->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
	    	->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
	    	->join('grado', 'carrera_grado.fkgrado', 'grado.id')
	    	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
	    	->join('curso', 'carrera_curso.fkcurso', 'curso.id')
	    	->join('inscripcion', 'cantidad_alumno.id', 'inscripcion.fkcantidad_alumno')
	    	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
	    	->where('inscripcion.fkpersona', Auth::user()->fkpersona)
	    	->where('ciclo.nombre', date('Y'))
	    	->where('catedratico_contenido_educativo.fkestado', 5)
	    	->where('catedratico_contenido_educativo.anio', date('Y'))
	    	->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'seccion.letra as seccion', 'carrera.nombre as carrera', 'grado.nombre as grado', 'curso.nombre as curso', 'catedratico_contenido_educativo.created_at as created_at'])->orderBy('catedratico_contenido_educativo.created_at', 'desc');	    	
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

   	public static function filtrarContenidoEducativoCatedratico($catedratico_curso, $anio)
   	{
		if($catedratico_curso == 0 && $anio == 0)
		{
			return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
				->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
				->join('inscripcion', 'cantidad_alumno.id', 'inscripcion.fkcantidad_alumno')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
				->where('catedratico_curso.fkpersona', Auth::user()->fkpersona)
                ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])->groupBy('catedratico_contenido_educativo.id');
		}   

		if($catedratico_curso > 0 && $anio == 0)
		{
			return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
				->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
				->join('inscripcion', 'cantidad_alumno.id', 'inscripcion.fkcantidad_alumno')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
				->where('catedratico_curso.fkpersona', Auth::user()->fkpersona)
				->where('catedratico_curso.id', $catedratico_curso)
                ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])->groupBy('catedratico_contenido_educativo.id');
		}  

		if($catedratico_curso == 0 && $anio > 0)
		{
			return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
				->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
				->join('inscripcion', 'cantidad_alumno.id', 'inscripcion.fkcantidad_alumno')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
				->where('catedratico_curso.fkpersona', Auth::user()->fkpersona)
				->where('catedratico_contenido_educativo.anio', $anio)
                ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])->groupBy('catedratico_contenido_educativo.id');
		}  

		if($catedratico_curso > 0 && $anio > 0)
		{
			return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
				->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
				->join('inscripcion', 'cantidad_alumno.id', 'inscripcion.fkcantidad_alumno')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
				->where('catedratico_curso.fkpersona', Auth::user()->fkpersona)
				->where('catedratico_curso.id', $catedratico_curso)				
				->where('catedratico_contenido_educativo.anio', $anio)
                ->select(['catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.fkestado as fkestado', 'catedratico_contenido_educativo.created_at as created_at', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.fkformato_documento as fkformato_documento', 'catedratico_contenido_educativo.fkcatedratico_curso as fkcatedratico_curso'])->groupBy('catedratico_contenido_educativo.id');
		} 								
   	}

   	public static function seleccionarContenido($id)
   	{
   		return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
				->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
				->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
				->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
	            ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
	            ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
	            ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
	            ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
	            ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
	            ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
	            ->where('catedratico_contenido_educativo.id', $id)
                ->select('catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.created_at as created_at', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.codigo as codigo', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')->first();
   	}

   	public static function seleccionarContenidoAlumno($id)
   	{
   		return Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
				->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
				->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
				->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
	            ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
	            ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
	            ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
	            ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
	            ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
	            ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
	            ->where('catedratico_contenido_educativo.id', $id)
                ->select('catedratico_contenido_educativo.id as id', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.responder as responder', 'formato_documento.formato as formato', 'catedratico_contenido_educativo.created_at as created_at', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.codigo as codigo', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')->first();
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
