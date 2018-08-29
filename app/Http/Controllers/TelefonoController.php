<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Telefono;
use App\Persona;
use App\Estado;
use App\Compania;

class TelefonoController extends Controller
{
    protected $verificar_insert =
    [
        'fkcompania' => 'required|integer', 
        'fkpersona' => 'required|integer',
        'numero' => 'required|max:10|unique:telefono'                                                                   
    ];

    protected $verificar_update =
    [
        'fkcompania' => 'required|integer', 
        'numero' => 'required|max:10|unique:telefono'            
    ];    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   

    }

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $query = Telefono::dataTelefono($id);
        } 
        return Datatables::of($query)
            ->addColumn('action', function ($data) {
                $btn_estado = '<button class="delete-modal-telefono btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="edit-modal-telefono btn btn-warning btn-xs" type="button" data-fktelefono="'.$data->id.'" data-fkcompania="'.$data->fkcompania.'" data-numero="'.$data->numero.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function dropcompania(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Compania::buscarCompania($id);
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
            $insert = new Telefono();
            $insert->numero = $request->numero;             
            $insert->fkcompania = $request->fkcompania;
            $insert->fkpersona = $request->fkpersona;           
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
            $cambiar = Telefono::findOrFail($id);  
            $cambiar->numero = $request->numero;             
            $cambiar->fkcompania = $request->fkcompania;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = Telefono::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy($id)
    {
        //
    }
}
