<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Agenda;
use App\TipoActividad;
use App\Estado;

class AgendaController extends Controller
{
       protected $verificar_insert =
    [
        'descripcion' => 'required|max:1000',
       	'fecha_ingresada' => 'required',  
        'fecha_programada' => 'required', 
        'fktipoactividad' => 'required|integer'
    ];

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('director', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('secretaria', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('contador', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('catedratico', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('alumno', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
    }

     public function index()
    {
        return view('/academico/agenda/agenda');
    }

     public function getdata()
    {
        $color_estado = "";
        $query = Agenda::dataAgenda();
        return Datatables::of($query)
            ->addColumn('action', function ($data) {
                switch ($data->fkestado) {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-estado="activo"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-estado="inactivo"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-descripcion="'.$data->descripcion.'" data-fecha_ingresada="'.$data->fecha_ingresada.'" data-fecha_programada="'.$data->fecha_programada.'" data-fkactividad="'.$data->fkactividad.'" data-fkestado="'.$data->fkestado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function droptipoactividad(Request $request, $id)
    {
        if($request->ajax()){
            $estado = TipoActividad::buscarActividad($id);
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
            $insert = new Agenda();
            $insert->descripcion = $request->descripcion;
            $insert->fecha_ingresada = date("Y-m-d", strtotime($request->fecha_ingresada));  
            $insert->fecha_programada = date("Y-m-d", strtotime($request->fecha_programada));
			$insert->fktipoactividad = $request->fktipoactividad;
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
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Agenda::findOrFail($id);  
            $cambiar->descripcion = $request->descripcion;
            $cambiar->fecha_ingresada = date("Y-m-d", strtotime($request->fecha_ingresada)); 
            $cambiar->fecha_programada =date("Y-m-d", strtotime($request->fecha_programada)); 
        	$cambiar->fktipoactividad = $request->fktipoactividad;
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
        $cambiar = Agenda::findOrFail($request->pkagenda); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
      
    }
}
