<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\CarreraGrado;
use App\Carrera;
use App\Grado;
use App\Estado;


class CarreraGradoController extends Controller
{
     protected $verificar_insert =
    [
        'fkcarrera' => 'required|integer', 
        'fkgrado' => 'required|integer',
                                                                              
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
     
        return view('/mantenimiento/CarreraGrado/carreragrado');
    }


 public function getdata()
    {
      
         $color_estado = "";
        $query = CarreraGrado::dataCarreraGrado();

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

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-fkcarrera="'.$data->fkcarrera.'" data-fkgrado="'.$data->fkgrado.'" data-fkestado="'.$data->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }


 public function dropcarrera(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Carrera::buscarCarrera($id);
            return response()->json($estado);
        }        
    }

    public function dropgrado(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Grado::buscarGrado($id);
            return response()->json($estado);
        }        
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
            $existe = CarreraGrado::where('fkcarrera', $request->fkcarrera)->where('fkgrado', $request->fkgrado)->get();
            
            if(count($existe) == 0)
            {
                $insert = new CarreraGrado();            
                $insert->fkcarrera = $request->fkcarrera;
                $insert->fkgrado = $request->fkgrado;           
                $insert->fkestado = $estado->id;                                                                           
                $insert->save();
                return response()->json($insert);
            }
            return response()->json($existe);            
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
            $existe = CarreraGrado::where('fkcarrera', $request->fkcarrera)->where('fkgrado', $request->fkgrado)->get();
            
            if(count($existe) == 0)
            {            
                $cambiar = CarreraGrado::findOrFail($id);              
                $cambiar->fkcarrera = $request->fkcarrera;
                $cambiar->fkgrado = $request->fkgrado;
                $cambiar->save();
                return response()->json($cambiar);
            }
            return response()->json($existe);              
        }        
    }

  public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = CarreraGrado::findOrFail($request->pkcarreragrado); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
        //
    }

}
