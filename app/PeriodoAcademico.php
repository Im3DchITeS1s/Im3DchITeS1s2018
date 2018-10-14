<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
	protected $table = 'periodo_academico';
	protected $guarded = ['id', 'fkestado', 'fktipo_periodo'];
	protected $fillable = ['nombre', 'inicio', 'fin'];

	public static function dataPeriodoAcademico(){
		return PeriodoAcademico::join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->select(['periodo_academico.id as id', 'periodo_academico.nombre as periodo_academico', 'periodo_academico.ciclo as ciclo', 'tipo_periodo.nombre as tipo_periodo', 'periodo_academico.fkestado as id_estado', 'periodo_academico.inicio as inicio', 'periodo_academico.fin as fin'])
            ->orderBy('periodo_academico.nombre', 'asc');
	}

	public static function buscarPerAca($id){
		return PeriodoAcademico::join('tipo_periodo','periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->select('periodo_academico.id as id','periodo_academico.ciclo as ciclo')
            ->where('periodo_academico.ciclo', date("Y"))
            ->where('periodo_academico.nombre', 'Primer')
            ->where('periodo_academico.fkestado', $id)
            ->get();
	}

	public static function buscarTipoPeriodo($id){
		return TipoPeriodo::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

	public static function buscarIDPeriodoAcademico($id)
    {
        return PeriodoAcademico::findOrFail($id);       
    } 
}
