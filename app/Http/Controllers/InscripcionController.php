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
use App\TipoPeriodo;
use App\CarreraGrado;
use App\Carrera;
use App\Grado;
use App\Seccion;
use App\Persona;
use App\Ciclo;
use App\Estado;


class InscripcionController extends Controller
{
    
    protected $verificar_insert =
    [
        'fkcantidad_alumno' => 'required|integer', 
        'fktipo_periodo' => 'required|integer', 
        'fkpersona' => 'required|integer', 
        'fkciclo' => 'required|integer', 
        'pago'=>'numeric|required|between:1,1000.99', 
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

        $query = inscripcion::dataInscripcion(date('Y'));

        return Datatables::of($query)
            ->addColumn('alumno', function ($data) {
                return $data->nombre1." ".$data->nombre2." ".$data->apellido1." ".$data->apellido2;
            }) 
            ->addColumn('gradocarreraseccion', function ($data) {
                return $data->carrera." ".$data->grado." ".$data->seccion;
            })    
            ->addColumn('tipo_periodo', function ($data) {
                return $data->tipo_periodo;
            })                                           
            ->addColumn('action', function ($data) {
                    $color_estado = "";
                    $colot_btn = "";
                    $icon = "";                
                    $accion = "";

                switch ($data->fkestado) {
                       case 25:
                        $color_estado = 'success';
                        $colot_btn = 'success';
                        $icon = ' fa-check-circle';
                        $accion = 'Inscrito';
                        break;
                    case 26:
                        $color_estado = 'primary';
                        $colot_btn = 'danger';
                        $icon = ' fa-file-text-o';
                        $accion = 'Papeleria Incompleta';                        
                        break;
                    case 27:
                        $color_estado = 'danger';
                        $colot_btn = 'success';
                        $icon = ' fa-angle-double-down';
                        $accion = 'No Inscrito';                          
                        break;  
                    case 28:
                        $color_estado = 'warning';
                        $colot_btn = 'primary';
                        $icon = 'fa-graduation-cap';
                        $accion = 'Retirado(A)';                          
                        break;               
                }
                
               $btn_estado = '<button class="delete-modal btn btn-'.$colot_btn.' btn-xs" type="button" data-id="'.$data->id.'" data-accion="'.$accion.'"><span class="'.$icon.'"></span></button>';

                $btn_edit = '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-fkcantidad_alumno="'.$data->fkcantidad_alumno.'" data-fkpersona="'.$data->fkpersona.'" data-fktipo_periodo="'.$data->fktipo_periodo.'" data-ciclo="'.$data->fkciclo.'" data-pago="'.$data->pago.'" data-fkestado="'.$data->fkestado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> ';         

                return  '<small class="label label-'.$color_estado.'">'.$data->estado.'</small> '.$accion.' '.$btn_edit.' '.$btn_estado;
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


    public function dropestudiante(Request $request, $id)
        {
            if($request->ajax()){
                $data = Persona::buscarEstudiante($id);
                return response()->json($data);
            }        
        }  

     public function dropencargado(Request $request, $id)
        {
            if($request->ajax()){
                $data = Persona::buscarEncargado($id);
                return response()->json($data);
            }        
        } 

     public function droptiperiodo(Request $request, $id)
    {
        if($request->ajax()){
            $estado = TipoPeriodo::buscarTipoPeriodo($id);
            return response()->json($estado);
        }        
    }  
        

     public function dropciclo(Request $request, $id)
        {
            if($request->ajax()){
                $data = Ciclo::buscarCiclo($id);
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
            $insert->fktipo_periodo = $request->fktipo_periodo;    
            $insert->fkpersona = $request->fkpersona; 
            $insert->fkciclo = $request->fkciclo;   
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
            $cambiar->ciclo = $request->fkciclo;   
            $cambiar->pago = $request->pago;
            $cambiar->save();
            return response()->json($cambiar); 
        }       
    }     

    public function cambiarEstado(Request $request)
    {
        switch ($request->accion) {
            case 'Inscrito':
                $estado = Estado::buscarIDEstado(26);
                break;
            
             case 'Papeleria Incompleta':
                $estado = Estado::buscarIDEstado(27);
                break;

             case 'No Inscrito':
                $estado = Estado::buscarIDEstado(28);
                break;

          case 'Retirado(A)':
                $estado = Estado::buscarIDEstado(25);
                break;                         
        }

        $cambiar = Inscripcion::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy(Inscripcion $inscripcion)
    {
        //
    }
}
