<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Pregunta;
use App\Estado;
use Auth;

class PreguntaController extends Controller
{
    protected $verificar_insert =
    [
        'descripcion' => 'required|max:500',
        'fkcuestionario' => 'required|integer',
        'fketiqueta' => 'required|integer',                    
    ];

    protected $verificar_update =
    [
        'descripcion' => 'required|max:500',
        'fketiqueta' => 'required|integer',                    
    ]; 

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('director', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('secretaria', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('contador', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('catedratico', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('alumno', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
    }       

    public function index()
    {
        //
    }

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $query = Pregunta::dataPregunta($id);
        } 
        return Datatables::of($query)              
            ->addColumn('action', function ($data) {
                $btn_estado = '<button class="deletePregunta-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_add_pregunta = '<button class="addRespuesta-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-pregunta="'.$data->pregunta.'">
                    <span class="fa fa-plus"></span></button>';

                $btn_edit = '<button class="editPregunta-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-pregunta="'.$data->pregunta.'" data-fketiqueta="'.$data->fketiqueta.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';                                

                return $btn_add_pregunta.' '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function buscaretiqueta(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Pregunta::buscaretiqueta($id);
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
            $insert = new Pregunta();
            $insert->fkcuestionario = $request->fkcuestionario;             
            $insert->fketiqueta = $request->fketiqueta;
            $insert->descripcion = $request->descripcion;                      
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

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->verificar_update);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $update = Pregunta::findOrFail($id);            
            $update->fketiqueta = $request->fketiqueta;
            $update->descripcion = $request->descripcion;                                                                   
            $update->save();
            return response()->json($update);
        } 
    }

    public function cambiarEstado(Request $request)
    {
        if($request->fkestado == 5)
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = Pregunta::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
        //
    }
}
