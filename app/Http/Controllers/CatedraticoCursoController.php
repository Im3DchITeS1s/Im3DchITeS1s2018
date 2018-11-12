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
use App\CarreraCurso;
use App\CatedraticoCurso;
use App\Carrera;
use App\Grado;
use App\Seccion;
use App\Persona;
use App\Estado;


class CatedraticoCursoController extends Controller
{
     
    protected $verificar_insert =
    [
        'fecha_inicio' => 'required', 
        'fecha_fin' => 'required', 
        'cantidad_periodo' => 'required|integer', 
        'fkpersona'=>'numeric|required|integer', 
        'fkcantidad_alumno'=>'numeric|required|integer', 
        'fkcarrera_curso'=>'numeric|required|integer', 
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
       return view('/academico/catedraticocurso/catedraticocurso');   
    }

   public function getdata()
    {
        
        $color_estado = "";
        $query = CatedraticoCurso::dataCatedraticoCurso(5);
        return Datatables::of($query)
            ->addColumn('catedratico', function ($data) {
                return $data->nombre1." ".$data->nombre2." ".$data->apellido1." ".$data->apellido2;
            }) 
            ->addColumn('datos_carreras', function ($data) {
                return $data->carrera.' '.$data->grado.' '.$data->curso;

            })  
            ->addColumn('fecha', function ($data) {
                return date("d/m/Y", strtotime($data->fecha_inicio))." - ".date("d/m/Y", strtotime($data->fecha_fin));
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

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'"data-fkpersona="'.$data->fkpersona.'" data-fkcantidad_alumno="'.$data->fkcantidad_alumno.'" data-fecha_inicio="'.$data->fecha_inicio.'" data-fecha_fin="'.$data->fecha_fin.'" data-cantidad_periodo="'.$data->cantidad_periodo.'" data-id_estado="'.$data->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function dropcarreracatedratico(Request $request, $id)
    {
        if($request->ajax()){
            $estado = CatedraticoCurso::dataCatedraticoCurso($id);
            return response()->json($estado);
        }        
    }
  

    public function dropcarreracurso(Request $request, $id)
    {
    	if($request->ajax()){
    		$data = CarreraCurso::buscarcarreracurso($id);
    		return response()->json($data);
    	}
    }


    public function dropdocente(Request $request, $id)
        {
            if($request->ajax()){
                $data = Persona::buscarDocente($id);
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
            $existe = CatedraticoCurso::where('fkpersona', $request->fkpersona)->where('fkcantidad_alumno', $request->fkcantidad_alumno)->where('fkcarrera_curso', $request->fkcarrera_curso)->get();

            if(count($existe) == 0)
            {
                $insert = new CatedraticoCurso();            
                $insert->fecha_inicio = date("Y-m-d", strtotime($request->fecha_inicio)); 
                $insert->fecha_fin = date("Y-m-d", strtotime($request->fecha_fin));           
                $insert->cantidad_periodo = $request->cantidad_periodo;
                $insert->fkpersona = $request->fkpersona;           
                $insert->fkcantidad_alumno = $request->fkcantidad_alumno;
                $insert->fkcarrera_curso = $request->fkcarrera_curso;            
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
            $existe = CatedraticoCurso::where('fkpersona', $request->fkpersona)->where('fkcantidad_alumno', $request->fkcantidad_alumno)->where('fkcarrera_curso', $request->fkcarrera_curso)->get();

            $cambiar = new CatedraticoCurso();            
            $cambiar->fecha_inicio = $request->fecha_inicio;
            $cambiar->fecha_fin = $request->fecha_fin;          
            $cambiar->cantidad_periodo = $request->cantidad_periodo;
            if(count($existe) == 0)
            {            
                $cambiar->fkpersona = $request->fkpersona;           
                $cambiar->fkcantidad_alumno = $request->fkcantidad_alumno;
                $cambiar->fkcarrera_curso = $request->fkcarrera_curso;   
            }         
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
        $cambiar = CatedraticoCurso::findOrFail($request->pkcatedraticocurso); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }
    }
