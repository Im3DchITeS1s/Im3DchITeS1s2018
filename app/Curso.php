<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $table = 'curso';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataCurso(){
		return Curso::join('estado', 'curso.fkestado', '=', 'estado.id')
                    ->select(['curso.id as id', 'curso.nombre as nombre', 'curso.fkestado as id_estado']);

	}

	public static function buscarCurso($id){
		return Curso::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDCurso($id)
    {
        return Curso::findOrFail($id);       
    } 
}
