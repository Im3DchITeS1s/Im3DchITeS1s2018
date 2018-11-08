<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }     
  
    public function dropseccion(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Seccion::buscarSeccion($id);
            return response()->json($estado);
        }        
    } 

    public function destroy($id)
    {
      
    }

}
