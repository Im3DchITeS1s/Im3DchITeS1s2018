<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
	protected $table = 'tipo_persona';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataTipoPersona(){
		return TipoPersona::join('estado', 'tipo_persona.fkestado', '=', 'estado.id')
                    ->select(['tipo_persona.id as id', 'tipo_persona.nombre as nombre', 'tipo_persona.fkestado as id_estado']);
	}

	public static function buscarTipoPersona($id){
		return TipoPersona::select('id', 'nombre')
            ->where('nombre', 'Alumno')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDTipoPersona($id)
    {
        return TipoPersona::findOrFail($id);       
    } 	
}
