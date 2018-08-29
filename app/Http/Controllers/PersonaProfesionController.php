<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\PersonaProfesion;
use App\Persona;
use App\Estado;
use App\Profesion;

class PersonaProfesionController extends Controller
{
    protected $verificar_insert =
    [
        'fkprofesion' => 'required|integer', 
        'fkpersona' => 'required|integer',                                                                            
    ];

    protected $verificar_update =
    [
        'fkprofesion' => 'required|integer',         
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
            $query = PersonaProfesion::dataPersonaProfesion($id);
        } 
        return Datatables::of($query)
            ->addColumn('action', function ($data) {
                $btn_estado = '<button class="delete-modal-profesion btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="edit-modal-profesion btn btn-warning btn-xs" type="button" data-fkpersona_profesion="'.$data->id.'" data-fkprofesion="'.$data->fkprofesion.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function dropprofesion(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Profesion::buscarProfesion($id);
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
            $insert = new PersonaProfesion();
            $insert->fkpersona = $request->fkpersona;
            $insert->fkprofesion = $request->fkprofesion;
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
            $cambiar = PersonaProfesion::findOrFail($id);  
            $cambiar->fkprofesion = $request->fkprofesion;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = PersonaProfesion::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy($id)
    {
        //
    }
}
