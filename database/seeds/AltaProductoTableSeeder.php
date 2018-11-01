<?php

use Illuminate\Database\Seeder;
use App\AltaProducto;


class AltaProductoTableSeeder extends Seeder
{
   
    public function run()
    {
    	$nuevo = new AltaProducto();
        $nuevo->cantidad = 10;
        $nuevo->observacion = 'compra de productos para abastecimiento'; 
    	$nuevo->fkproducto = 1;
    	$nuevo-> save();
        
    }
}
