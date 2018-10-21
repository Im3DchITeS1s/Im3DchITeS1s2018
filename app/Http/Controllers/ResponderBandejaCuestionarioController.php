<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Inscripcion;
use App\Cuestionario;
use App\Pregunta;
use App\Respuesta;
use Auth;

class ResponderBandejaCuestionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {            
        return view('/blackboard/bandejacuestionario');
    }

    public function getdataCarrera(Request $request)
    {
        if($request->ajax()){
            $cursosalumnos = Inscripcion::carrerasAlumnos(Auth::user()->fkpersona);
            return response()->json($cursosalumnos);
        }        
    }    

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $cursosalumnos = Inscripcion::cursosAlumno(Auth::user()->fkpersona, $id);
            return response()->json($cursosalumnos);
        }        
    }

    public function contadorCuestionarios(Request $request, $carrega_grado_seccion, $carrera_curso)
    {
        if($request->ajax()){
            $query = Cuestionario::dataBandejaCuestionario($carrega_grado_seccion, $carrera_curso);
            $data = count($query);
            return response()->json($data);
        }        
    } 

    public function mostrarCuestionariosSeleccionados($carrega_grado_seccion, $carrera_curso)
    {
        $cuestionarios = Cuestionario::dataBandejaCuestionario($carrega_grado_seccion, $carrera_curso);
        return view('/blackboard/cuestionariospararesolver', compact('cuestionarios'));      
    }

    public function encabezadoCuestionarioSeleccionado($id)
    {
        $encabezados = Cuestionario::dataEncabezadoCuestionario($id);
        $preguntas = Pregunta::preguntaEncuesta($id);
        $respuestas = Respuesta::respuestaCuestionarioPregunta($id);
        return view('/blackboard/resolvercuestionario', compact('encabezados', 'preguntas', 'respuestas'));      
    }    

    public function create()
    {

    }

    public function store(Request $request)
    {  
        $contar_respuesta = 0;
        $respuesta_unica = array();
        $respuesta_unica = array_merge($respuesta_unica, $request->respuesta_unica);

        dd($request->respuesta_multiple);

        foreach ($request->respuesta_unica as $value) {
            $respuesta = Respuesta::respuestaCorrecta($value);

            if ($respuesta->validar == 1) {
                $contar_respuesta++;
            }
        }

        $encuesta = Cuestionario::punteoCuestionario($request->idEncuesta);
        dd($encuesta->punteo/$contar_respuesta);
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
}
