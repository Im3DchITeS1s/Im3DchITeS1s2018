<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Compania;
use App\Estado;

class CompaniaController extends Controller
{
    protected $verificar_insert =
    [
        'nombre' => 'required|max:50|unique:compania',
    ];

    protected $verificar_update =
    [
        'nombre' => 'required|max:32|unique:compania,nombre,$id',
        'fkestado' => 'required'
    ];    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('mantenimiento/Compania/compania');
    }

    public function getdata()
    {
        $color_estado = "";

        $query = Compania::dataCompania();

        return Datatables::of($query)
            ->addColumn('action', function ($data) {
                switch ($data->id_estado) {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-estado="activo"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-estado="inactivo"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-nombre="'.$data->nombre.'" data-fkestado="'.$data->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }  

    public function dropestado(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Estado::buscarEstadoPadre($id);
            return response()->json($estado);
        }        
    }       

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Compania();
            $insert->nombre = $request->nombre;
            $insert->fkestado = $estado->id;
            $insert->save();
            return response()->json($insert);
        }        
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
        $validator = Validator::make(Input::all(), $this->verificar_update);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Compania::findOrFail($id);  
            $cambiar->nombre = $request->nombre;
            $cambiar->fkestado = $request->fkestado;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = Compania::findOrFail($request->pkprofesion); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy($id)
    {
        //
    }
}
