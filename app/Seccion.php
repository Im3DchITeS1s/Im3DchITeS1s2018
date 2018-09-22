<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
	protected $table = 'seccion';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['letra'];

	public static function dataSeccion(){
		return Seccion::join('estado', 'seccion.fkestado', '=', 'estado.id')
                    ->select(['seccion.id as id', 'seccion.letra as letra', 'seccion.fkestado as id_estado']);
    }
<<<<<<< HEAD

=======
    
>>>>>>> 75fbd3b1049611b171e246e26b9fd941634fe774
    public static function buscarSeccion($id){
		return Seccion::select('id', 'letra')
            ->where('fkestado', $id)
            ->orderBy('letra', 'asc')->get();
	}

    public static function BucarIDSeccion($id)
    {
        return Seccion::findOrFail($id);       
    } 

}
