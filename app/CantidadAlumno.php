<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadAlumno extends Model
{
	protected $table = 'cantidad_alumno';
	protected $guarded = ['id', 'fkcarrera_grado', 'fkseccion', 'fkestado'];
	protected $fillable = ['cantidad'];

	public static function dataCantidadAlumno(){
	    return CantidadAlumno::join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
					->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
					->join('grado', 'carrera_grado.fkgrado', 'grado.id') 
					->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
					->join('estado', 'cantidad_alumno.fkestado', 'estado.id')
                    ->select(['cantidad_alumno.id as id','cantidad_alumno.cantidad as cantidad','cantidad_alumno.fkcarrera_grado as fkcarrera_grado', 'carrera.nombre as carrera', 'carrera_grado.fkcarrera as fkcarrera', 'grado.nombre as grado', 'carrera_grado.fkgrado as fkgrado','seccion.letra as letra','cantidad_alumno.fkseccion as fkseccion','cantidad_alumno.fkestado as id_estado']);
   }

   public static function buscarCantidadAlumno($id){
		return Carrera::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

	public static function buscarCantidadAlumn($id){
		return Grado::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}
	
 	public static function buscarCantidadSeccion($id){
		return Seccion::select('id', 'letra')
            ->where('fkestado', $id)
            ->orderBy('letra', 'asc')->get();
	}

	public static function buscarIDCantidadAlumno($id)
    {
        return CantidadAlumno::findOrFail($id);       
    } 
}
