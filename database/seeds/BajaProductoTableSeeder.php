<?php

use Illuminate\Database\Seeder;
use App\BajaProducto;


class BajaProductoTableSeeder extends Seeder
{
    
    public function run()
    {
        $nuevo = new BajaProducto();
        $nuevo->cantidad = 10;
    	$nuevo->fkinventario_stock = 1;
    	$nuevo-> save();
    }
}
