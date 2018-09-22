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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $query = Sistema_Rol_Usuario::dataSistemaRolUsuario($id);
        } 
        return Datatables::of($query)
            ->addColumn('sistema_rol', function ($data) {
                return $data->sistema.' / '.$data->rol;
            })                
            ->addColumn('action', function ($data) {
                $btn_eliminar = '<button class="delete-modal-sistema_rol_usuario btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';        

                return $btn_eliminar;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
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

    public function cambiarEstado(Request $request)
    {
        
    }
    
    public function destroy($id)
    {
        $delete = Sistema_Rol_Usuario::findOrFail($id); 
        $delete->delete();
        return response()->json($delete);  
    }
}
