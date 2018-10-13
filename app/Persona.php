<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $table = 'persona';
	protected $guarded = ['id', 'fktipo_persona', 'fkpais_departamento', 'fkgenero', 'fkestado', 'codigo'];
	protected $fillable = ['dpi', 'nombre1', 'nombre2', 'nombre3', 'apellido1', 'apellido2', 'apellido3', 'lugar', 'fecha_nacimiento'];

	public static function dataPersona(){
		return Persona::join('tipo_persona', 'persona.fktipo_persona', '=', 'tipo_persona.id')
					->join('pais_departamento', 'persona.fkpais_departamento', '=', 'pais_departamento.id')
					->join('genero', 'persona.fkgenero', '=', 'genero.id')
					->join('estado', 'persona.fkestado', '=', 'estado.id')
                    ->select(['persona.id as id', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2',
                	'persona.nombre3 as nombre3', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2',
                	'persona.apellido3 as apellido3', 'persona.lugar as lugar', 'persona.fecha_nacimiento as fecha_nacimiento', 'persona.fktipo_persona as fktipo_persona', 'persona.fkpais_departamento as fkpais_departamento', 'persona.fkgenero as fkgenero', 'persona.fkestado as fkestado', 'persona.codigo as codigo', 'persona.dpi as dpi', 'estado.nombre as estado']);
	}

	public static function dataInfoPersona($id){
		return Persona::join('tipo_persona', 'persona.fktipo_persona', '=', 'tipo_persona.id')
					->join('pais_departamento', 'persona.fkpais_departamento', '=', 'pais_departamento.id')
					->join('genero', 'persona.fkgenero', '=', 'genero.id')
					->join('estado', 'persona.fkestado', '=', 'estado.id')
                    ->select(['persona.id as id', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2',
                	'persona.nombre3 as nombre3', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2',
                	'persona.apellido3 as apellido3', 'persona.lugar as lugar', 'persona.fecha_nacimiento as fecha_nacimiento', 'persona.fktipo_persona as fktipo_persona', 'persona.fkpais_departamento as fkpais_departamento', 'persona.fkgenero as fkgenero', 'persona.fkestado as fkestado', 'persona.codigo as codigo', 'persona.dpi as dpi', 'estado.nombre as estado'])
                	->where('persona.fktipo_persona','=',$id);

	}

	public static function buscarEstadoPersona($id){
		return Persona::join('tipo_persona', 'persona.fktipo_persona', '=', 'tipo_persona.id')
			->select('persona.id as id', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'nombre')
			->where('persona.fkestado', $id)
            ->orderBy('apellido1', 'asc')->get();
	}

	public static function buscarEstudiante($id){
		return Persona::join('tipo_persona', 'persona.fktipo_persona', '=', 'tipo_persona.id')
			->select('persona.id as id', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'nombre')
			->where('persona.fktipo_persona', 6)
            ->orderBy('apellido1', 'asc')->get();
	}

    public static function buscarIDPersona($id)
    {
        return Persona::findOrFail($id);       
    } 

    public static function existePersona($id)
    {
        return Persona::select('nombre1', 'nombre2', 'apellido1', 'apellido2')
        			->where('id', $id)
        			->get();       
    }     		
}
