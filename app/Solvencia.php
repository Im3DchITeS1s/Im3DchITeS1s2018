<?php

namespace App;

use Iluminate\Database\Eloquent\Model; 

class Solvencia extends Model 
{
	protected $table = 'solvencia ';
	protected $filalable = ['nombre']

	public static function dataSolvencia(){
		return "resultado de la consulta";
		
	}

}