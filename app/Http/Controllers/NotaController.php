<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Inscripcion;
use App\PeriodoAcademico;
use App\CantidadAlumno;
use App\CarreraCurso;
use App\CarreraGrado;
use App\Ciclo;
use App\Carrera;
use App\Grado;
use App\Curso;
use App\Nota;
use App\Estado;


class NotaController extends Controller
{
  protected $verificar_insert =
    [
        'fkinscripcion' => 'required|integer', 
        'fkperiodo_academico' => 'required|integer', 
        'fkcantidad_alumno' => 'required|integer', 
        'fkcarrera_curso'=>'required|integer', 
        'nota'=>'required|numeric|between:1,100', 
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
       return view('/academico/nota/nota');   
    }
    
   public function getdata()
    {
      
        $color_estado = "";
        $query = Nota::dataNota(5);
        return Datatables::of($query)
            ->addColumn('alumno', function ($data) {
                return $data->nombre1." ".$data->nombre2." ".$data->apellido1." ".$data->apellido2;
            }) 
            ->addColumn('datos_carreras', function ($data) {
                return $data->carrera.' '.$data->grado.' '.$data->punteo;
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

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'"data-fkinscripcion="'.$data->fkinscripcion.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fkcantidad_alumno="'.$data->fkcantidad_alumno.'" data-fkcarrera_curso="'.$data->fkcarrera_curso.'" data-nota="'.$data->nota.'" data-id_estado="'.$data->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

      public function dropinscrito(Request $request, $id)
        {
            if($request->ajax()){
                $data = Inscripcion::AlumosCarrera($id,date('Y'));
                return response()->json($data);
            }        
        }  
  
 	public function dropcarreracurso(Request $request, $id)
    {
    	if($request->ajax()){
    		$data = CarreraCurso::buscarcarreracurso($id);
    		return response()->json($data);
    	}
    }

    
    public function create()
    {
      
    }

  public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Nota();         
            $insert->fkinscripcion = $request->fkinscripcion;
            $insert->fkperiodo_academico = $request->fkperiodo_academico;           
            $insert->fkcantidad_alumno = $request->fkcantidad_alumno;
            $insert->fkcarrera_curso = $request->fkcarrera_curso; 
            $insert->nota = $request->nota;         
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
            $cambiar = new Nota();         
            $cambiar->fkinscripcion = $request->fkinscripcion;
            $cambiar->fkperiodo_academico = $request->fkperiodo_academico;           
            $cambiar->fkcantidad_alumno = $request->fkcantidad_alumno;
            $cambiar->fkcarrera_curso = $request->fkcarrera_curso; 
            $cambiar->nota = $request->nota;          
            $cambiar->fkestado = $estado->id;     
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function destroy($id)
    {
        //
    }
    
      public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);
        $cambiar = CatedraticoCurso::findOrFail($request->pknota); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }
    }
