<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Alumno_Contenido_Educativo;
use App\Catedratico_Contenido_Educativo;
use App\VistaContenido;
use App\Inscripcion;
use App\Estado;
use App\Persona;
use App\Ciclo;
use Auth;

class AlumnoContenidoEducativoController extends Controller
{
    protected $verificar_insert =
    [
        'fkcatedratico_contenido' => 'required|integer',
        'descripcion' => 'required|max:100', 
        'archivo' => 'required'                              
    ];  

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'store', 'update']]);
        $this->middleware('director', ['only' => ['index', 'store', 'update']]);
        $this->middleware('secretaria', ['only' => ['index', 'store', 'update']]);
        $this->middleware('contador', ['only' => ['index', 'store', 'update']]);
        $this->middleware('catedratico', ['only' => ['index', 'store', 'update']]);
        //$this->middleware('alumno', ['only' => ['index', 'store', 'update']]);
    }

    public function index()
    {
        return view('/blackboard/cargarcontenidoalumno');
    }

    public function index_historico()
    {
        $alumno = Persona::where('id', Auth::user()->fkpersona)->first();
        $carreras = Inscripcion::join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
            ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
            ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
            ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
            ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
            ->where('inscripcion.fkpersona', $alumno->id)
            ->where('cantidad_alumno.fkestado', 5)
            ->select('carrera.id as id', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion')
            ->get();
        $ciclos = Ciclo::select('id', 'nombre')->get();
        return view('/blackboard/historicos/contenidoeducativoalumnohistorico', compact('alumno', 'carreras', 'ciclos'));
    }    

    public function getdata($id)
    {
        $inscripcion = Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', Auth::user()->fkpersona)->where('ciclo.nombre', date('Y'))->first();

        $query = Alumno_Contenido_Educativo::tareaAlumnoGet($id, $inscripcion->id);

        return Datatables::of($query)
            ->addColumn('created_at', function ($data) {
                return date('d/m/Y h:i:s', strtotime($data->created_at));
            })                           
            ->addColumn('action', function ($data) {

                return '<a href="'.$data->archivo.'" class="btn btn-success btn-xs pull-right visto-documento" style="margin-right: 5px;" data-id="'.$data->id.'" target="_blank">Descargar</a>  <button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);        
    }    

    public function getDataAlumnoLogin()
    {
        $query = Catedratico_Contenido_Educativo::dataContenidoAlumnoLogueado();

        return Datatables::of($query)
            ->addColumn('catedratico', function ($data) {
                return $data->nombre1.' '.$data->nombre2.' '.$data->apellido1.' '.$data->apellido2;
            })        
            ->addColumn('carreracurso', function ($data) {
                return $data->grado.' '.$data->carrera.' / '.$data->seccion.' - '.$data->curso;
            })               
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
            ->addColumn('titulo', function ($data) {
                return $data->titulo.' - '.$data->formato;
            })                       
            ->addColumn('action', function ($data) {
                $imprimir = '';
                $tarea = '';
                $idinscripcion = 0;

                $fkinscripcion = Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', Auth::user()->fkpersona)->where('ciclo.nombre', date('Y'))->first();             

                if(!is_null($fkinscripcion))
                {
                    $idinscripcion = $fkinscripcion->id;
                }

                $visto = 'NO';
                $tareaexiste = Alumno_Contenido_Educativo::where('fkcatedratico_contenido', $data->id)
                                                         ->where('fkinscripcion', $idinscripcion)
                                                         ->where('fkestado', 5)->get();

                $vistos = VistaContenido::visto($idinscripcion, $data->id);

                if($data->responder == 1 && count($vistos) > 0)
                {
                    $tarea = '<button class="ver-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'">Tarea</button>';
                }                 

                if(count($vistos) > 0)
                {
                    $visto = 'SI';

                    if($data->responder == 1 && count($tareaexiste) > 0)
                    {
                        $imprimir = '<button class="imprimir-modal btn btn-primary btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-print"></span></button>';                        
                    }

                }

                return '<small class="label bg-green btn-xs">'.$visto.'</small>  '.$tarea.' '.$imprimir.' <a href="'.$data->archivo.'" class="btn btn-success btn-xs pull-right visto-documento" style="margin-right: 5px;" data-id="'.$data->id.'" target="_blank">Descargar</a>';
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);        
    }

    public function filtrogetdata($carrera, $curso, $anio)
    {
        $query = Catedratico_Contenido_Educativo::filtrardataContenidoAlumnoLogueado($carrera, $curso, $anio);

        return Datatables::of($query)
            ->addColumn('catedratico', function ($data) {
                return $data->nombre1.' '.$data->nombre2.' '.$data->apellido1.' '.$data->apellido2;
            })                     
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
            ->addColumn('titulo', function ($data) {
                return $data->titulo.' - '.$data->formato;
            })                       
            ->addColumn('action', function ($data) {
                $imprimir = '';
                $tarea = '';
                $idinscripcion = 0;

                $fkinscripcion = Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', Auth::user()->fkpersona)->where('ciclo.nombre', date('Y'))->first();             

                if(!is_null($fkinscripcion))
                {
                    $idinscripcion = $fkinscripcion->id;
                }

                $tareasexisten = Alumno_Contenido_Educativo::select('archivo')
                                                         ->where('fkcatedratico_contenido', $data->id)
                                                         ->where('fkinscripcion', $idinscripcion)
                                                         ->where('fkestado', 5)->get();
                $notarea = 0;
                foreach ($tareasexisten as $tareaexiste) 
                {
                    $notarea = $notarea + 1;
                    $tarea = $tarea.'  <a href="'.$data->archivo.'" class="btn btn-warning btn-xs" style="margin-right: 5px;" target="_blank">Tarea'.$notarea.'</a>';
                }            

                if($data->responder == 1 && count($tareasexisten) > 0)
                {
                    $imprimir = '<button class="imprimir-modal btn btn-primary btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-print"></span></button>';                        
                }

                return $tarea.' '.$imprimir.' <a href="'.$data->archivo.'" class="btn btn-success btn-xs pull-right visto-documento" style="margin-right: 5px;" data-id="'.$data->id.'" target="_blank">Descargar</a>';
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true); 
    }     

    public function create()
    {
        //
    }

    public function store_verificar(Request $request)
    {

        $fkinscripcion = Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', Auth::user()->fkpersona)->where('ciclo.nombre', date('Y'))->first();

        $vistos = VistaContenido::visto($fkinscripcion->id, $request->fkcatedratico_contenido_educativo);        

        if(count($vistos) == 0)
        {

            $insert = new VistaContenido();
            $insert->fkinscripcion = $fkinscripcion->id;
            $insert->fkcatedratico_contenido_educativo = $request->fkcatedratico_contenido_educativo;
            $insert->save();
            return response()->json($insert);

        }

        return response()->json($vistos);

    }    

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->verificar_insert);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            $fkinscripcion = Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', Auth::user()->fkpersona)->where('ciclo.nombre', date('Y'))->first();

            $insert = new Alumno_Contenido_Educativo();
            $insert->fkcatedratico_contenido = $request->fkcatedratico_contenido;
            $insert->descripcion = $request->descripcion;
            $insert->archivo = $request->archivo;
            $insert->fkestado = 5;
            $insert->fkinscripcion = $fkinscripcion->id;
            $insert->save();

            return response()->json($insert);
        } 
    }

    public function show($id)
    {
        $persona = Persona::find(Auth::user()->fkpersona);

        $idinscripcion = Inscripcion::join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')->where('fkpersona', Auth::user()->fkpersona)->where('ciclo.nombre', date('Y'))->first();  

        $tareas = Alumno_Contenido_Educativo::where('fkcatedratico_contenido', $id)
                                                 ->where('fkinscripcion', $idinscripcion->id)
                                                 ->where('fkestado', 5)->get();      

        $contenido = Catedratico_Contenido_Educativo::seleccionarContenidoAlumno($id);

        $pdf = \PDF::loadView('blackboard.reporte.contenidoeducativoalumno', compact('contenido', 'tareas', 'persona'));

        return $pdf->download($persona->nombre1.'_'.$persona->apellido1.' '. date('d-m-Y h:i:s') .'.pdf');           
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function cambiarEstado(Request $request)
    {
        if($request->fkestado == 5)
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = Alumno_Contenido_Educativo::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }      

    public function destroy($id)
    {
        //
    }
}
