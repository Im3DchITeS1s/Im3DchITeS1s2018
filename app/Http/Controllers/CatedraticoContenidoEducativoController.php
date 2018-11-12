<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\CatedraticoCurso;
use App\Formato_Documento;
use App\Estado;
use App\VistaContenido;
use App\Alumno_Contenido_Educativo;
use App\Persona;
use App\Ciclo;
use App\Catedratico_Contenido_Educativo;
use Auth;

class CatedraticoContenidoEducativoController extends Controller
{
    protected $verificar_insert =
    [
        'titulo' => 'required|max:50',
        'descripcion' => 'required|max:500',   
        'archivo' => 'required',
        'fkcatedratico_curso' => 'required|integer',   
        'fkformato_documento' => 'required|integer',                      
    ];

    protected $verificar_update =
    [
        'titulo' => 'required|max:50',
        'descripcion' => 'required|max:500',   
        'archivo' => 'required',
        'fkcatedratico_curso' => 'required|integer',   
        'fkformato_documento' => 'required|integer',                      
    ];    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'index_historico', 'index_historico', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('director', ['only' => ['index', 'index_historico', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('secretaria', ['only' => ['index', 'index_historico', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('contador', ['only' => ['index', 'index_historico', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('catedratico', ['only' => ['index', 'store', 'update']]);
        $this->middleware('alumno', ['only' => ['index', 'index_historico', 'store', 'update', 'cambiarEstado']]);
    }

    public function index()
    {
        return view('/blackboard/cargarcontenidocatedratico');
    }

    public function index_historico()
    {
        $catedratico = Persona::where('id', Auth::user()->fkpersona)->first();
        $carreras = CatedraticoCurso::join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
            ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
            ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
            ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
            ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
            ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
            ->join('curso', 'carrera_curso.fkcurso', 'curso.id')            
            ->where('catedratico_curso.fkpersona', $catedratico->id)
            ->where('catedratico_curso.fkestado', 5)
            ->select('catedratico_curso.id as id', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')
            ->get();
        $ciclos = Ciclo::select('id', 'nombre')->get();
        return view('/blackboard/historicos/contenidoeducativocatedraticohistorico', compact('catedratico', 'carreras', 'ciclos'));
    }

    public function getdata()
    {
        $color_estado = "";

        $query = Catedratico_Contenido_Educativo::dataContenidoEducativoCatedratico(Auth::user()->fkpersona);

        return Datatables::of($query)
            ->addColumn('tarea', function ($data) {
                if($data->responder == 1)
                {
                    return "SI";
                }
                else
                {
                    return "NO";                    
                }
            })     
            ->addColumn('created_at', function ($data) {
                return date('d/m/Y h:i:s', strtotime($data->created_at));
            })                  
            ->addColumn('action', function ($data) {
                $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-responder="'.$data->responder.'" data-formato="'.$data->formato.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkformato_documento="'.$data->fkformato_documento.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function getdataFiltro($catedratico_curso, $anio)
    {
        $color_estado = "";

        $query = Catedratico_Contenido_Educativo::filtrarContenidoEducativoCatedratico($catedratico_curso, $anio);

        return Datatables::of($query)
            ->addColumn('tarea', function ($data) {
                if($data->responder == 1)
                {
                    return "SI";
                }
                else
                {
                    return "NO";                    
                }
            })
            ->addColumn('created_at', function ($data) {
                return date('d/m/Y h:i:s', strtotime($data->created_at));
            })                      
            ->addColumn('action', function ($data) {
                $imprimir = ' ';
                $vistos = VistaContenido::contenidoVistoCatedratico($data->id);
                $tareas = Alumno_Contenido_Educativo::tareasEntregadasGlobal($data->id);

                if(count($vistos) > 0)
                {
                    $imprimir = '<button class="imprimir-modal btn btn-primary btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-print"></span></button>';
                }

                if($data->responder == 1)
                {
                    return '<small class="label bg-yellow btn-xs">'.count($vistos).'</small>  <button class="ver-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'">'.count($tareas).'</button>  '.$imprimir.' <a href="'.$data->archivo.'" class="btn btn-success btn-xs pull-right" style="margin-right: 5px;" target="_blank">Descargar</a>';
                }
                else
                {
                    return '<small class="label bg-yellow btn-xs">'.count($vistos).'</small>  '.$imprimir.' <a href="'.$data->archivo.'" class="btn btn-success btn-xs pull-right" style="margin-right: 5px;">Descargar</a>';                  
                }                

            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }    

    public function getdataID($id)
    {
        $color_estado = "";

        $query = Catedratico_Contenido_Educativo::dataContenidoEducativoCatedraticoID($id);

        return Datatables::of($query)
            ->addColumn('tarea', function ($data) {
                if($data->responder == 1)
                {
                    return "SI";
                }
                else
                {
                    return "NO";                    
                }
            }) 
            ->addColumn('created_at', function ($data) {
                return date('d/m/Y h:i:s', strtotime($data->created_at));
            })                       
            ->addColumn('action', function ($data) {
                $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-responder="'.$data->responder.'" data-formato="'.$data->formato.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkformato_documento="'.$data->fkformato_documento.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }         

    public function dropInformacionCatedratico(Request $request)
    {
        if($request->ajax()){
            $informacion = CatedraticoCurso::buscarInformacionCatedratico(Auth::user()->fkpersona);
            return response()->json($informacion);
        }        
    }

    public function dropFormato(Request $request)
    {
        if($request->ajax()){
            $informacion = Formato_Documento::dropFormatoDocumento();
            return response()->json($informacion);
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
            $insert = new Catedratico_Contenido_Educativo();
            $insert->titulo = $request->titulo;  
            $insert->descripcion = $request->descripcion; 
            $insert->archivo = $request->archivo;    
            $insert->responder = $request->responder;      
            $insert->anio = date('Y');            
            $insert->fkcatedratico_curso = $request->fkcatedratico_curso; 
            $insert->fkformato_documento = $request->fkformato_documento;                   
            $insert->fkestado = $estado->id;                                                                           
            $insert->save();
            return response()->json($insert);
        }                                             
    }

    public function show($id)
    {
        $contenido = Catedratico_Contenido_Educativo::seleccionarContenido($id);
        $vistos = VistaContenido::contenidoVistoCatedratico($id);
        $tareas = Alumno_Contenido_Educativo::tareasEntregadasGlobal($id);  

        $pdf = \PDF::loadView('blackboard.reporte.contenidoeducativocatedratico', compact('contenido', 'vistos', 'tareas'));

        return $pdf->download($contenido->nombre1.'_'.$contenido->apellido1.' '. date('d-m-Y h:i:s') .'.pdf');              
    }

    public function edit($id)
    {
        $contenido = Catedratico_Contenido_Educativo::seleccionarContenido($id);
        $documentos = Alumno_Contenido_Educativo::tareasEntregadasAlumnos($id);
        $tareas = Alumno_Contenido_Educativo::tareasEntregadasGlobal($id);  

        return view('/blackboard/alumnossubierontarea', compact('documentos', 'contenido', 'tareas'));  
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_update);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambio = Catedratico_Contenido_Educativo::findOrFail($id);
            $cambio->titulo = $request->titulo;  
            $cambio->descripcion = $request->descripcion; 
            $cambio->archivo = $request->archivo;    
            $cambio->responder = $request->responder;                  
            $cambio->fkcatedratico_curso = $request->fkcatedratico_curso; 
            $cambio->fkformato_documento = $request->fkformato_documento;
            $cambio->save();
            return response()->json($cambio);
        }
    }

    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = Catedratico_Contenido_Educativo::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    
}
