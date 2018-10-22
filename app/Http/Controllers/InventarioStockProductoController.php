<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Producto;
use App\InventarioStockProducto;


class InventarioStockProductoController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
       return view('GestionAdministrativa/Inventario/stock');
    }

 	public function getdata()
    {
	   $query = InventarioStockProducto::dataInventarioStockProducto();

        return Datatables::of($query)->make(true); 	
    }


    
}
