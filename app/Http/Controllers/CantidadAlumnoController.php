<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\CantidadAlumno;
use App\CarreraGrado;
use App\Carrera;
use App\Grado;
use App\Seccion;
use App\Estado;

class CantidadAlumnoController extends Controller
{
    protected $verificar_insert =
    [
    	'cantidad' => 'required|integer',
        'fkcarrera_grado' => 'required|integer', 
        'fkseccion' => 'required|integer'                              
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

        return view('/mantenimiento/CantidadAlumno/cantidadalumno');
    }

    public function getdata()
    {
      
        $color_estado = "";
        $query = CantidadAlumno::dataCantidadAlumno();

        return Datatables::of($query)
            ->addColumn('grado_carrera_seccion', function ($data) {
                return $data->grado.' '.$data->carrera.' '.$data->letra;
            }) 
            ->addColumn('action', function ($data) {
                 
                switch ($data->id_estado) {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-estado="activo"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-estado="inactivo"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'"data-cantidad="'.$data->cantidad.'" data-fkcarrera_grado="'.$data->fkcarrera_grado.'" data-fkseccion="'.$data->fkseccion.'" data-fkestado="'.$data->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function dropCantidadCarreraGrado(Request $request, $id)
    {
        if($request->ajax()){
            $estado = CarreraGrado::buscarCarreragrado($id);
            return response()->json($estado);
        }        
    }

    public function dropCantidadSeccion(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Seccion::buscarSeccion($id);
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

    public function store(Request $request){
  
    $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $existe = CantidadAlumno::where('fkcarrera_grado', $request->fkcarrera_grado)
            ->where('fkseccion', $request->fkseccion)->where('fkestado', 5)->get();

            if(count($existe) == 0)
            {
                $insert = new CantidadAlumno();           
                $insert->fkcarrera_grado = $request->fkcarrera_grado;
                $insert->fkseccion = $request->fkseccion;  
                $insert->cantidad = $request->cantidad;         
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
            $existe = CantidadAlumno::where('fkcarrera_grado', $request->fkcarrera_grado)->where('fkseccion', $request->fkseccion)->where('fkestado', 5)->get();

            if(count($existe) == 0)
            {
                $cambiar = CantidadAlumno::findOrFail($id);            
                $cambiar->cantidad = $request->cantidad;
                $cambiar->fkcarrera_grado = $request->fkcarrera_grado;    
                $cambiar->fkseccion = $request->fkseccion;                                    
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

        $cambiar = CantidadAlumno::findOrFail($request->pkcantidadalumno); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
        //
    }
}
