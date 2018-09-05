<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaTableSeeder extends Seeder
{
   
    public function run()
    {
	     	$nuevo = new Categoria();
	        $nuevo->nombre = 'Otro';
	        $nuevo->fkestado = 5;
	        $nuevo->save();

	        $nuevo = new Categoria();
	        $nuevo->nombre = 'Utencilio limpieza';
	        $nuevo->fkestado = 5;
	        $nuevo->save();
    }
}
