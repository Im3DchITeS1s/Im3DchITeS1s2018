<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['monto','fecha'];

	/*public static function dataPago(){
		return Producto::join('tipo_pago', 'pago.fktipo_pago', '=', 'tipo_pago.id')
					->join('fkmes', 'pago.fkmes', '=', 'mes.id')
					->join('estado', 'pago.fkestado', '=', 'estado.id')
                    ->select(['pago.id as id', 'pago.monto as monto', 'mes.nombre as mes','tipo_pago.nombre as tipo_pago', 'tipo_pago.fkestado as fkestado', 'tipo_pago.fkcategoria as fkcategoria'])
                    ->orderBy('tipo_pago.id','asc');
    }

*/

}
