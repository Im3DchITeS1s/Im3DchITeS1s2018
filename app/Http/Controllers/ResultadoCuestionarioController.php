<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use App\Inscripcion;
use App\Pregunta;
use App\Respuesta;
use App\Cuestionario;
use App\Resultado_Cuestionario;
use App\Alumno_Cuestionario_Respuesta;
use Auth;
use PDF;

class ResultadoCuestionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {

    }

    public function existeCuestionarioResuelto(Request $request, $id)
    {
        if($request->ajax()){
            $data = Resultado_Cuestionario::buscarCuestionarioDelAlumno(Auth::user()->fkpersona, $id, 5);
            $cantidad = count($data);
            return response()->json($cantidad);
        }        
    }

    public function mostrarGraficaResultado($id)
    {
        $dataCol1 = array();
        $dataCol2 = array();
        $resultado = array();

        $correcto = Alumno_Cuestionario_Respuesta::contarRespuestasValidas(Auth::user()->fkpersona, $id, 1);

        $incorrecto = Alumno_Cuestionario_Respuesta::contarRespuestasValidas(Auth::user()->fkpersona, $id, 0);         

        $dataCol1['name'] = 'Correcta';
        $dataCol1['y'] = count($correcto);       
        $dataCol2['name'] = 'Incorrecta'; 
        $dataCol2['y'] = count($incorrecto);

        array_push($resultado,$dataCol1);
        array_push($resultado,$dataCol2);
        return response()->json($resultado); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $correcto = Alumno_Cuestionario_Respuesta::contarRespuestasValidas(Auth::user()->fkpersona, $id, 1);
        $incorrecto = Alumno_Cuestionario_Respuesta::contarRespuestasValidas(Auth::user()->fkpersona, $id, 0);   
        $total = 0;

        $fecha_impresion = date('d/m/Y h:i:s');
        $resultado_encuesta = Resultado_Cuestionario::buscarCuestionarioDelAlumno(Auth::user()->fkpersona, $id, 5);
        $respuesta_encuesta = Alumno_Cuestionario_Respuesta::respuestasDelCuestionario(Auth::user()->fkpersona, $id);
        $preguntas_encuesta_original = Pregunta::preguntaEncuestaImprimir($id, 21);
        $respuestas_encuesta_original = Respuesta::respuestaCuestionarioPreguntaImprimir($id, 21);
        $catedratico = Cuestionario::cursoPerteneceAlCuestionario($id);

        $pdf = PDF::loadView('blackboard.reporte.constancia', ['fecha_impresion' => $fecha_impresion, 'resultado_encuesta' => $resultado_encuesta, 'respuesta_encuesta' => $respuesta_encuesta, 'preguntas_encuesta_original' => $preguntas_encuesta_original, 'respuestas_encuesta_original' => $respuestas_encuesta_original, 'catedratico' => $catedratico, 'correcto' => $correcto, 'incorrecto' => $incorrecto, 'total' => $total]); 

        return view('blackboard.calificacion', compact('fecha_impresion', 'resultado_encuesta', 'respuesta_encuesta', 'preguntas_encuesta_original', 'respuestas_encuesta_original', 'catedratico', 'correcto', 'incorrecto', 'total'));
    }

    public function edit($id)
    {
        $correcto = Alumno_Cuestionario_Respuesta::contarRespuestasValidas(Auth::user()->fkpersona, $id, 1);
        $incorrecto = Alumno_Cuestionario_Respuesta::contarRespuestasValidas(Auth::user()->fkpersona, $id, 0);   
        $total = 0;

        $fecha_impresion = date('d/m/Y h:i:s');
        $resultado_encuesta = Resultado_Cuestionario::buscarCuestionarioDelAlumno(Auth::user()->fkpersona, $id, 5);
        $respuesta_encuesta = Alumno_Cuestionario_Respuesta::respuestasDelCuestionario(Auth::user()->fkpersona, $id);
        $preguntas_encuesta_original = Pregunta::preguntaEncuestaImprimir($id, 21);
        $respuestas_encuesta_original = Respuesta::respuestaCuestionarioPreguntaImprimir($id, 21);
        $catedratico = Cuestionario::cursoPerteneceAlCuestionario($id);

        $pdf = PDF::loadView('blackboard.reporte.constancia', ['fecha_impresion' => $fecha_impresion, 'resultado_encuesta' => $resultado_encuesta, 'respuesta_encuesta' => $respuesta_encuesta, 'preguntas_encuesta_original' => $preguntas_encuesta_original, 'respuestas_encuesta_original' => $respuestas_encuesta_original, 'catedratico' => $catedratico, 'correcto' => $correcto, 'incorrecto' => $incorrecto, 'total' => $total]);

        return $pdf->download($resultado_encuesta->nombre1.'_'.$resultado_encuesta->apellido1.' '. date('d-m-Y h:i:s') .'.pdf');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
