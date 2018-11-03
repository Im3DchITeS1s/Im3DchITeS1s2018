<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CatedraticoCurso extends Model
{
	protected $table = 'catedratico_curso';
	protected $guarded = ['id', 'fkpersona', 'fkcantidad_alumno', 'fkcarrera_curso', 'fkestado'];
	protected $fillable = ['fecha_inicio', 'fecha_fin', 'cantidad_periodo'];

	public static function dataCatedraticoCurso(){
		return CatedraticoCurso::join('cantidad_alumno','catedratico_curso.fkcantidad_alumno','cantidad_alumno.id')
					->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
					->join('carrera', 'carrera_grado.fkcarrera', '=', 'carrera.id')
					->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
					->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')	
					->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
					->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
					->join('persona', 'catedratico_curso.fkpersona', '=', 'persona.id')
					->select(['catedratico_curso.id as id','cantidad_alumno.fkcarrera_grado as fkcarrera_grado','carrera_grado.fkcarrera','carrera.nombre as carrera','carrera_grado.fkgrado as fkgrado','grado.nombre as grado','catedratico_curso.fkpersona as fkpersona','persona.nombre1','persona.nombre2','persona.apellido1','persona.apellido2','catedratico_curso.fecha_inicio','catedratico_curso.fecha_fin','catedratico_curso.cantidad_periodo', 'catedratico_curso.fkestado as id_estado']);
	}

	public static function buscarCursoCatedratico($id){
		return CatedraticoCurso::join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
					->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
					->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
					->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', '=', 'cantidad_alumno.id')
					->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
					->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
					->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
                    ->select(['catedratico_curso.id as id', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion'])					
					->where('fkpersona', $id)
					->where('catedratico_curso.fkestado', 5)
					->orderBy('carrera', 'asc')
					->get();
	}

	public static function buscarInformacionCatedratico($id){
		return CatedraticoCurso::join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
					->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
					->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
					->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', '=', 'cantidad_alumno.id')
					->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
					->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
					->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
                    ->select('catedratico_curso.id as id', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion')					
					->where('fkpersona', $id)
					->where('catedratico_curso.fkestado', 5)
					->orderBy('carrera.nombre', 'asc')
					->get();
	}	
<<<<<<< HEAD

	public static function seleccionarCursoGradoID($id)
	{
		return CatedraticoCurso::find($id)->first();
	}
=======
		public static function buscarIDCatedraticoCurso($id)
    {
        return Inscripcion::findOrFail($id);       
    } 
>>>>>>> 259712ffc26cef6f1cf939f377abe4f2f1743714
}
