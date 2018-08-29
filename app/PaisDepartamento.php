<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaisDepartamento extends Model
{
	protected $table = 'pais_departamento';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'idpadre'];

	public static function buscarDepartamento($id){
		return PaisDepartamento::select('id', 'nombre')
			->where('idpadre', $id)
			->where('fkestado', 5)
            ->orderBy('nombre', 'asc')->get();
	}	

    public static function buscarIDPais($id)
    {
        $departamento = PaisDepartamento::findOrFail($id);    
        return PaisDepartamento::findOrFail($departamento->idpadre);
    } 		
}
