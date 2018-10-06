<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
	protected $table = 'periodo_academico';
	protected $guarded = ['id', 'fkestado', 'fktipo_periodo'];
	protected $fillable = ['nombre', 'inicio', 'fin', 'ciclo'];

	public static function buscarPeriodoAcademico($id){
		return PeriodoAcademico::join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->select('periodo_academico.id as id', 'periodo_academico.nombre as periodo_academico', 'periodo_academico.ciclo as ciclo', 'tipo_periodo.nombre as tipo_periodo')
            ->where('periodo_academico.fkestado', $id)
            ->where('periodo_academico.ciclo', date("Y"))
            ->orderBy('periodo_academico.nombre', 'asc')->get();
	}

			
}
