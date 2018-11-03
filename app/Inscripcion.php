<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
   	protected $table = 'inscripcion';
<<<<<<< HEAD
	protected $guarded = ['id', 'fkcantidad_alumno', 'fktipo_periodo', 'fkpersona', 'pago', 'fkestado', 'fkciclo'];
=======
	protected $guarded = ['id', 'fkcantidad_alumno', 'fktipo_periodo', 'fkpersona','fkciclo', 'pago', 'fkestado'];
>>>>>>> b9c047feba51f1fcd6933a9389606f12cb549ae3

	public static function carrerasAlumnos($id, $ciclo){
		return Inscripcion::join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id')
			->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
            ->select('inscripcion.fkcantidad_alumno as fkcantidad_alumno', 'carrera_grado.id as fkcarrera_grado', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'inscripcion.fktipo_periodo as fktipo_periodo')
			->where('inscripcion.fkpersona', $id)
			->where('ciclo.nombre', $ciclo)
            ->orderBy('carrera.nombre', 'asc')->get();
	}	

	public static function cursosAlumno($id, $fkcantidad_alumno , $ciclo){
		return Inscripcion::join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id')
			->join('carrera_curso', 'carrera.id', 'carrera_curso.fkcarrera')
			->join('curso', 'carrera_curso.fkcurso', 'curso.id')
			->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
            ->select('inscripcion.fkcantidad_alumno as fkcantidad_alumno', 'carrera_curso.id as fkcarrera_curso', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')
			->where('inscripcion.fkpersona', $id)
			->where('ciclo.nombre', $ciclo)
			->where('inscripcion.fkcantidad_alumno', $fkcantidad_alumno)
            ->orderBy('curso.nombre', 'asc')->get();
	}	

	public static function dataInscripcion($ciclo)
	{
		return Inscripcion::join('cantidad_alumno','inscripcion.fkcantidad_alumno','cantidad_alumno.id')
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id')		
			->join('periodo_academico','inscripcion.fktipo_periodo','periodo_academico.id')	
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')		
<<<<<<< HEAD
			->join('persona','inscripcion.fkpersona','persona.id')					
			->join('estado','inscripcion.fkestado','estado.id')		
			->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
			->where('ciclo.nombre', $ciclo)	
			->select(['inscripcion.id as id','cantidad_alumno.fkcarrera_grado as fkcarrera_grado','carrera_grado.fkcarrera','carrera.nombre as carrera','carrera_grado.fkgrado as fkgrado','grado.nombre as grado', 'seccion.id as fkseccion','seccion.letra as seccion','periodo_academico.id as fktipo_periodo', 'tipo_periodo.nombre as tipo_periodo','inscripcion.fkpersona as fkpersona','persona.nombre1','persona.nombre2','persona.apellido1','persona.apellido2', 'ciclo.nombre as ciclo','inscripcion.pago as pago','inscripcion.fkestado as fkestado','inscripcion.fkcantidad_alumno as fkcantidad_alumno']);
=======
			->join('persona','inscripcion.fkpersona','persona.id')	
			->join('ciclo', 'inscripcion.fkciclo','ciclo.id')			
			->join('estado','inscripcion.fkestado','estado.id')			
			->select(['inscripcion.id as id','cantidad_alumno.fkcarrera_grado as fkcarrera_grado','carrera_grado.fkcarrera','carrera.nombre as carrera','carrera_grado.fkgrado as fkgrado','grado.nombre as grado', 'seccion.id as fkseccion','seccion.letra as seccion','periodo_academico.id as fktipo_periodo', 'tipo_periodo.nombre as tipo_periodo','inscripcion.fkpersona as fkpersona','persona.nombre1','persona.nombre2','persona.apellido1','persona.apellido2','ciclo.nombre as ciclo','inscripcion.pago as pago','inscripcion.fkestado as fkestado','inscripcion.fkcantidad_alumno as fkcantidad_alumno']);
>>>>>>> b9c047feba51f1fcd6933a9389606f12cb549ae3

	}

	public static function buscarGradoCarrrera($id){
		return Inscripcion::join('carrera_curso', 'inscripcion.fkcarrera_curso', '=', 'carrera_curso.id')
			->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
			->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', '=', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
			->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
			->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
            ->select(['inscripcion.id as id', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion'])					
			->where('fkpersona', $id)
			->where('inscripcion.fkestado', 5)
			->orderBy('carrera', 'asc')
			->get();
	}

	
	public static function buscarIDInscripcion($id)
    {
        return Inscripcion::findOrFail($id);       
    } 

	public static function alumnoInscrito($id, $ciclo)
    {
        return Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', $id)->where('ciclo.nombre', $ciclo)->select('inscripcion.*')->first();       
    }     
}
