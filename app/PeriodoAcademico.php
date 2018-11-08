<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class PeriodoAcademico extends Model
{
	protected $table = 'periodo_academico';
	protected $guarded = ['id', 'fkestado', 'fktipo_periodo'];
	protected $fillable = ['nombre', 'inicio', 'fin'];

	public static function dataPeriodoAcademico(){
		return PeriodoAcademico::join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->select(['periodo_academico.id as id', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'periodo_academico.fkestado as id_estado', 'periodo_academico.inicio as inicio', 'periodo_academico.fin as fin'])
            ->orderBy('periodo_academico.nombre', 'asc');
	}

	public static function buscarPeriodoAcademico($id){
		return PeriodoAcademico::join('tipo_periodo','periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->select('periodo_academico.id as id', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo')
            ->where('periodo_academico.fkestado', $id)
            ->get();
	}

	public static function buscarFechaInicioFin($id){
		return PeriodoAcademico::select('inicio', 'fin')
            ->where('id', $id)
            ->get();
	}	

	public static function buscarTipoPeriodo($id){
		return TipoPeriodo::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

	public static function verficiarFechaPeriodo($inicio, $fin, $id)
    {
        return PeriodoAcademico::where('inicio', '<=', $inicio)
        						->where('fin', '>=', $fin)
        						->where('id', $id)
        						->where('fkestado', 5)
        						->select('id')->get();   
    } 	

	public static function buscarIDPeriodoAcademico($id)
    {
        return PeriodoAcademico::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('periodoacademico.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('periodoacademico.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('periodoacademico.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('periodoacademico.deleted', $data);
	    });

	}    
}
