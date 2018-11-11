<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\TipoPago;
use App\Mes;
use App\Inscripcion;
use App\CantidadAlumno;
use App\Estado;
use App\Pago;
use App\Persona;

class PagoController extends Controller
{
    protected $verificar_insert =
    [
        'fkmes' => 'required|integer', 
        'fktipo_pago' => 'required|integer',
        'fkinscripcion' => 'required|integer',
        'pago' => 'required|numeric'                                                                   
    ];

 	public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('director', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('secretaria', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('contador', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('catedratico', ['only' => ['index', 'cambiarEstado']]);
        $this->middleware('alumno', ['only' => ['index', 'cambiarEstado']]);
    }

    public function index()
    {   
        return view('GestionAdministrativa/ControlPago/pago');
    }

    public function getPago($fkinscripcion) //funciones de llenado de la datable
    {

        $query = Pago::dataPago($fkinscripcion);

        return Datatables::of($query)
            ->addColumn('action', function ($data) {

                    $btn_estado = '<button class="delete-modal-pago btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                       return $btn_estado;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }    

    public function getdata($fkcantidad_alumno, $ciclo) //funciones de llenado de la datable
    {

        $query = Inscripcion::filtrarAlumnosPorCantidadAlumno($fkcantidad_alumno, $ciclo);

        return Datatables::of($query)
            ->addColumn('alumno', function ($data) {
                return $data->nombre1.' '.$data->nombre2.' '.$data->apellido1.' '.$data->apellido2;
            })
            ->addColumn('action', function ($data) {

                $btn_edit = '<button class="edit-modal-pago btn btn-success btn-xs" type="button" data-id="'.$data->id.'">
                    <span class="glyphicon glyphicon-folder-open"></span></button>';


                return $btn_edit;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Pago();
            $insert->fkestado = $estado->id;
            $insert->fkmes = $request->fkmes;
            $insert->fktipo_pago = $request->fktipo_pago;
            $insert->fkinscripcion = $request->fkinscripcion;
            $insert->pago = $request->pago;
            $insert->fecha = date('Y-m-d');
            $insert->save();
            return response()->json($insert);
        }        
    }    

    public function cambiarEstado(Request $request)
    {
        $cambiar = Pago::findOrFail($request->id); 
        if($request->fkestado == 5)
        {
            $cambiar->fkestado = 6;
        }
        else
        {
            $cambiar->fkestado = 5;
        }
        $cambiar->save();
        return response()->json($cambiar);
    }

    public function dropCarrerasGrados(Request $request, $id)
    {
        if($request->ajax()){
            $estado = CantidadAlumno::dropCantidadAlumnoCarrera($id);
            return response()->json($estado);
        }        
    }

    public function dropSeccionDeCarrera(Request $request, $id)
    {
        if($request->ajax()){
            $estado = CantidadAlumno::buscarSeccionDeCarrera($id);
            return response()->json($estado);
        }        
    } 

    public function dropmespagado(Request $request, $id, $mes)
    {
        if($request->ajax()){
            $estado = Pago::where('fkinscripcion', $id)->where('fkmes', $mes)->where('fkestado', 5)->select('pago.*')->get();
            $data = count($estado);
            return response()->json($data);
        }        
    }  


}#Fin Clase
