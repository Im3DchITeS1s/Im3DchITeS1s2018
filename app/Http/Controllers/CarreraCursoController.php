<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\CursoCarrera;
use App\Carrera;
use App\Curso;
use App\Estado;

class CarreraCursoController extends Controller
{
  
	 protected $verificar_insert =
    [
        'fkcarrera' => 'required|integer', 
        'fkcurso' => 'required|integer',
                                                                              
    ];

    protected $verificar_update =
    [
     
        'fkcarrera' => 'required|integer', 
        'fkcurso' => 'required|integer',         
    ];    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        return view('/mantenimiento/CarreraCurso/carreracurso');
    }

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $query = CarreraCurso::dataCarreraCurso($id);
        } 
        return Datatables::of($query)
            ->addColumn('action', function ($data) {
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="edit-modal btn btn-warning btn-xs" type="button" data-fkcarrera="'.$data->id.'" data-fkcarrera="'.$data->fkcarrera.'" data-carrera="'.$data->carrera.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
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
            $insert = new CarreraCurso();            
            $insert->fkcarrera = $request->fkcarrera;
            $insert->fkcurso = $request->fkcurso;           
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
            $cambiar = CarreraCurso::findOrFail($id);              
            $cambiar->fkcarrera = $request->fkcarrera;
            $cambiar->fkcurso = $request->fkcurso;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = CarreraCurso::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy($id)
    {
        //
    }

}
