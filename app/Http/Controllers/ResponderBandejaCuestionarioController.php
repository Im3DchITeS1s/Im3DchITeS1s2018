<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\CatedraticoCurso;
use App\Inscripcion;
use App\Cuestionario;
use App\Pregunta;
use App\Respuesta;
use App\Resultado_Cuestionario;
use App\Alumno_Cuestionario_Respuesta;
use Auth;

class ResponderBandejaCuestionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'store']]);
        $this->middleware('director', ['only' => ['index', 'store']]);
        $this->middleware('secretaria', ['only' => ['index', 'store']]);
        $this->middleware('contador', ['only' => ['index', 'store']]);
        $this->middleware('catedratico', ['only' => ['index', 'store']]);
        //$this->middleware('alumno', ['only' => ['index', 'store']]);
    }

    public function index()
    {       
        return view('/blackboard/bandejacuestionario');
    }

    public function getdataCarrera(Request $request)
    {
        if($request->ajax()){
            $cursosalumnos = Inscripcion::carrerasAlumnos(Auth::user()->fkpersona, date('Y'));
            return response()->json($cursosalumnos);
        }        
    }    

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $cursosalumnos = Inscripcion::cursosAlumno(Auth::user()->fkpersona, $id, date('Y'));
            return response()->json($cursosalumnos);
        }        
    }

    public function contadorCuestionarios(Request $request, $carrega_grado_seccion, $carrera_curso)
    {
        if($request->ajax()){
            $inscrito = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));

            $query1 = Resultado_Cuestionario::cuestionariosResueltos(date('Y'), $carrega_grado_seccion, $carrera_curso, $inscrito->id);

            $query = Cuestionario::dataBandejaCuestionario($carrega_grado_seccion, $carrera_curso);
            if(count($query) > 0)
            {
                $data = count($query) - count($query1);
            }
            else
            {
                $data = count($query);
            }

            return response()->json($data);
        }        
    } 

    public function mostrarCuestionariosSeleccionados($carrega_grado_seccion, $carrera_curso)
    {
        $inscrito = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));

        $cuestionarios_resueltos = Resultado_Cuestionario::todosResultados(date('Y'), $carrega_grado_seccion, $carrera_curso, $inscrito->id);
        $cuestionarios = Cuestionario::dataBandejaCuestionario($carrega_grado_seccion, $carrera_curso);
        return view('/blackboard/cuestionariospararesolver', compact('cuestionarios_resueltos', 'cuestionarios'));      
    }

    public function encabezadoCuestionarioSeleccionado($id)
    {
        $verificar = Resultado_Cuestionario::buscarCuestionarioResuelto(5, Auth::user()->fkpersona);
        
        if(count($verificar) != 0)
        {
            $id = 0;
        }

        $encabezados = Cuestionario::dataEncabezadoCuestionario($id, 21);
        $preguntas = Pregunta::preguntaEncuesta($id, 21);
        $respuestas = Respuesta::respuestaCuestionarioPregunta($id, 21);
        $total = 0;

        return view('/blackboard/resolvercuestionario', compact('encabezados', 'preguntas', 'respuestas', 'total'));      
    }  

    public function buscarRespuestas(Request $request, $id)
    {
        if($request->ajax()){
            $query = Respuesta::respuestaPregunta($id);
            return response()->json($query);
        }         
    }     

    public function buscarRespuestasPorPregunta(Request $request, $id)
    {
        if($request->ajax()){
            $query = Respuesta::respuestasPorPregunta($id);
            return response()->json($query);
        }         
    }  

    public function create()
    {

    }

    public function store(Request $request)
    {  
             
    }

    public function storeCuestionario(Request $request)
    {  
        $inscrito = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));

        if(!is_null($inscrito))
        {
            foreach ($request->respuesta_unica as $value) {
                $respuesta = Respuesta::respuestaCorrecta($value);

                if(!is_null($respuesta))
                {
                    $insert = new Alumno_Cuestionario_Respuesta();
                    $insert->fkcuestionario = $request->idEncuesta;
                    $insert->fkinscripcion = $inscrito->id;
                    $insert->fkpregunta = $respuesta->fkpregunta;
                    $insert->fkrespuesta = $respuesta->id;    
                    $insert->save();  
                }      
            } 
            
            $this->calcularPunteoObtenido($request->idEncuesta, Auth::user()->fkpersona);

            return redirect()->route('obtenida.show', [$request->idEncuesta]); 
        }
        else
        {
            return view('errores.500');  
        }            
    }    

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
      
    }

  	public function cambiarEstado(Request $request)
    {
        
    }

    public function destroy($id)
    {

    }     

    public function calcularPunteoObtenido($fkencuesta, $fkpersona)
    {
        $total_uno = 0;
        $total_dos = 0;
        $cuestionario = Cuestionario::punteoCuestionario($fkencuesta);
        $preguntas = Pregunta::preguntaEncuestaImprimir($fkencuesta, 21);

        $punteo_respuesta_valida = $cuestionario->punteo/count($preguntas);
        $buscarRespuestasCuestionario = Alumno_Cuestionario_Respuesta::respuestasDelCuestionario($fkpersona, $fkencuesta);

        foreach ($buscarRespuestasCuestionario as $valor) {
            $respuestas = Respuesta::respustasTipoMultiple($fkencuesta, $valor->fkpregunta);

            switch ($valor->tipo) {
                case 'única':
                    if($valor->validar == 1)
                    {
                        $total_uno = $punteo_respuesta_valida + $total_uno;
                    }
                    break;
                case 'multiple':      
                    $distribucion_multiple_punteo = $punteo_respuesta_valida/count($respuestas);              
                    if($valor->validar == 1)
                    {
                        $total_dos = $distribucion_multiple_punteo + $total_dos;
                    }
                    break;                        
            }

        }

        $curso = Cuestionario::cursoPerteneceAlCuestionario($fkencuesta);
        $inscrito = Inscripcion::alumnoInscrito($fkpersona, date('Y'));

        $insert = new Resultado_Cuestionario();
        $insert->fkcuestionario = $fkencuesta;
        $insert->fkinscripcion = $inscrito->id;
        $insert->fkcarrera_curso = $curso->id;
        $insert->fkestado = 5;
        $insert->punteo = $total_uno + $total_dos;
        $insert->save();
    }         
}
