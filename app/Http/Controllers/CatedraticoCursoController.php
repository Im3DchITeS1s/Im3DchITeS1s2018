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
        'fecha_inicio' => 'required|integer', 
        'fecha_fin' => 'required|integer', 
        'cantidad_periodo' => 'required|integer', 
        'fkpersona'=>'numeric|required|intiger', 
        'fkcantidad_alumno'=>'numeric|required|intiger', 
        'fkcarrera_curso'=>'numeric|required|intiger', 
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/academico/catedraticocurso/catedraticocurso');   
    }

   public function getdata()
    {
      
        $color_estado = "";
        $query = catedraticocurso::dataCatedraticoCurso();

        return Datatables::of($query)
            ->addColumn('grado_carrera_curso', function ($data) {
                return $data->carrera.' '.$grado.' '.$data->curso;
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

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'"data-cantidad="'.$data->cantidad.'" data-fkcarrera_grado="'.$data->fkcarrera_grado.'" data-fkgrado="'.$data->fkseccion.'" data-fkestado="'.$data->id_estado.'">
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
            $insert = new CatedraticoCurso();            
            $insert->fecha_inicio = $request->fecha_inicio;
            $insert->fecha_fin = $request->fecha_fin;          
            $insert->cantidad_periodo = $request->cantidad_periodo;
            $insert->fkpersona = $request->fkpersona;           
            $insert->fkcantidad_alumno = $request->fkcantidad_alumno;
            $insert->fkcarrera_curso = $request->fkcarrera_curso;            
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
            $cambiar = new CatedraticoCurso();            
            $cambiar->fecha_inicio = $request->fecha_inicio;
            $cambiar->fecha_fin = $request->fecha_fin;          
            $cambiar->cantidad_periodo = $request->cantidad_periodo;
            $cambiar->fkpersona = $request->fkpersona;           
            $cambiar->fkcantidad_alumno = $request->fkcantidad_alumno;
            $cambiar->fkcarrera_curso = $request->fkcarrera_curso;            
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

        $cambiar = CarreraGrado::findOrFail($request->pkcatedraticocurso); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
        //
    }
        //
    }
