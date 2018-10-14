<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Inscripcion;
use App\CantidadAlumno;
use App\PeriodoAcademico;
use App\CarreraGrado;
use App\Carrera;
use App\Grado;
use App\Seccion;
use App\Persona;
use App\Estado;

class InscripcionController extends Controller
{
    
    protected $verificar_insert =
    [
        'fkcantidad_alumno' => 'required|integer', 
        'fkperiodo_academico' => 'required|integer', 
        'fkpersona' => 'required|integer', 
        'pago'=>'required|integer', 
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/academico/inscripcion/inscripcion');   
    }

    public function getdata()
    {
        $color_estado = "";
        $query = inscripcion::dataInscripcion();
        return Datatables::of($query)
            ->addColumn('action', function ($inscripcion) {
                switch ($inscripcion->id_estado) {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$inscripcion->id.'" data-estado="activo"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$inscripcion->id.'" data-estado="inactivo"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$inscripcion->id.'" data-fkcarrera_grado="'.$inscripcion->fkcarrera_grado.'" data-fktipo_periodo="'.$inscripcion->fktipo_periodo.'" data-nombre1="'.$inscripcion->nombre1.'" data-nombre2="'.$inscripcion->nombre2.'" data-fkestado="'.$inscripcion->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }


    public function dropCantidadCarreraGrado(Request $request, $id)
    {
        if($request->ajax()){
            $data = CantidadAlumno::dropCantidadAlumno($id);
            return response()->json($data);
        }        
    }  

    public function dropPeriodoAcademico(Request $request, $id)
        {
            if($request->ajax()){
                $estado = PeriodoAcademico::buscarPeriodoAcademico($id);
                return response()->json($estado);
            }        
        }

    public function dropestudiante(Request $request, $id)
        {
            if($request->ajax()){
                $data = Persona::buscarEstudiante($id);
                return response()->json($data);
            }        
        }  

        
    
    public function create()
    {
      
    }

   public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(25);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {            
            $insert = new Inscripcion();            
            $insert->fkcantidad_alumno = $request->fkcantidad_alumno;
            $insert->fkperiodo_academico = $request->fkperiodo_academico;    
            $insert->fkpersona = $request->fkpersona; 
            $insert->ciclo = date("Y");   
            $insert->pago = $request->pago;     
            $insert->fkestado = $estado->id;                                       
            $insert->save();
            return response()->json($insert);
        }
    }  

    public function show()
    {
       
    }
  
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Inscripcion::findOrFail($id);            
            $cambiar->fkcantidad_alumno = $request->fkcantidad_alumno;
            $cambiar->fktipo_periodo = $request->fktipo_periodo;    
            $cambiar->fkpersona = $request->fkpersona;
            $cambiar->ciclo = date("Y");   
            $cambiar->pago = $request->pago;
            $cambiar->fkestado = $estado->id;
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

        $cambiar = CantidadAlumno::findOrFail($request->pkcantidadalumno); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }
   
    public function destroy(Inscripcion $inscripcion)
    {
        //
    }
}
