<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Respuesta;
use App\Estado;
use Auth;

class RespuestaController extends Controller
{
    protected $verificar_insert =
    [
        'descripcion' => 'required|max:500',
        'fkpregunta' => 'required|integer',
        'validar' => 'required|integer',                    
    ];

    protected $verificar_update =
    [
        'descripcion' => 'required|max:500',
        'validar' => 'required|integer',                    
    ]; 

    public function index()
    {
        //
    }

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $query = Respuesta::dataRespuesta($id);
        } 
        return Datatables::of($query)    
            ->addColumn('validar', function ($data) {
                if($data->validar == 1)
                {
                    return "SI";
                }
                else
                {
                    return "NO";
                }                
            })                   
            ->addColumn('action', function ($data) {
                $btn_estado = '<button class="deleteRespuesta-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="editRespuesta-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-respuesta="'.$data->respuesta.'" data-validar="'.$data->validar.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';                                

                return $btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
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
            $insert = new Respuesta();
            $insert->fkpregunta = $request->fkpregunta;             
            $insert->descripcion = $request->descripcion;
            $insert->validar = $request->validar;                      
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
            $update = Respuesta::findOrFail($id);            
            $update->descripcion = $request->descripcion;
            $update->validar = $request->validar;                                                             
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

        $cambiar = Respuesta::findOrFail($request->id);
        $cambiar->validar = 0; 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
        //
    }
}
