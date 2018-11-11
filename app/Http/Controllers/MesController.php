<?php

namespace App\Http\Controllers;
use App\Mes;

use Illuminate\Http\Request;

class MesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }     
  
	public function dropMes(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Mes::buscarMes($id);
            return response()->json($estado);
        }        
    }
    
}
