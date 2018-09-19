<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoTableSeeder extends Seeder
{
  
    public function run()
    {
      
    	$nuevo = new Producto();
    	$nuevo->nombre = 'Hojas Papel Bond Carta';
    	$nuevo->descripcion = 'Papeleria y utiles de uso administrativo';
    	$nuevo->fkcategoria = 1;
    	$nuevo->fkestado = 5;
    	$nuevo-> save();

    	$nuevo = new Producto();
    	$nuevo->nombre = 'Cloro';
    	$nuevo->descripcion = 'Productos de Limpieza';
    	$nuevo->fkcategoria = 2;
    	$nuevo->fkestado = 5;
    	$nuevo-> save();

    }
}
