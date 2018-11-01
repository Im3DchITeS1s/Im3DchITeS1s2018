<?php

use Illuminate\Database\Seeder;
use App\InventarioStockProducto;

class InventarioStockProductoTableSeeder extends Seeder
{
 
    public function run()
    {
    	$nuevo = new InventarioStockProducto();
        $nuevo->cantidad = 10;
    	$nuevo->fkproducto = 1;
    	$nuevo-> save();

    	$nuevo = new InventarioStockProducto();
        $nuevo->cantidad = 15;
    	$nuevo->fkproducto = 2;
    	$nuevo-> save();
        
    }
}
