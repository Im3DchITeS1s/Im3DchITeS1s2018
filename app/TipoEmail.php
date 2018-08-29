<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmail extends Model
{
	protected $table = 'tipo_email';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataTipoEmail(){
		return TipoEmail::join('estado', 'tipo_email.fkestado', '=', 'estado.id')
                    ->select(['tipo_email.id as id', 'tipo_email.nombre as nombre', 'tipo_email.fkestado as id_estado']);
	}

	public static function buscarTipoEmail($id){
		return TipoEmail::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDTipoEmail($id)
    {
        return TipoEmail::findOrFail($id);       
    } 		
}
