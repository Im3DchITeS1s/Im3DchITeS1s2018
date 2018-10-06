<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPeriodo extends Model
{
	protected $table = 'tipo_periodo';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];


	public static function buscarTipoPeriodo($id){
		return TipoPeriodo::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDTipoPeriodo($id)
    {
        return TipoPeriodo::findOrFail($id);       
    } 
}
