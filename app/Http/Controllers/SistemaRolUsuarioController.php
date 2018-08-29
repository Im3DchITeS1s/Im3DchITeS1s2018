<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Sistema_Rol_Usuario;
use App\Sistema;
use App\Sistema_Rol;

class SistemaRolUsuarioController extends Controller
{
    public function index()
    {
        //
    }

    public function getdata()
    {

    }

    public function dropsistema(Request $request, $id)
    {
        if($request->ajax()){
            $data = Sistema::buscarSistema($id);
            return response()->json($data);
        }        
    }

    public function dropsistemarol(Request $request, $id)
    {
        if($request->ajax()){
            $data = Sistema_Rol::buscarSistemaRol($id);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(12);
        else
            $estado = Estado::buscarIDEstado(11);

        $cambiar = User::findOrFail($request->pkprofesion); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }
    
    public function destroy($id)
    {
        //
    }
}
