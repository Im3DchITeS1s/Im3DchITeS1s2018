<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etiqueta;

class EtiquetaController extends Controller
{
    public function index()
    {
        //
    }

    public function etiquetaestado(Request $request, $id)
    {
        if($request->ajax()){
            $data = Etiqueta::buscarEstadoEtiqueta($id);
            return response()->json($data);
        }        
    } 

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
