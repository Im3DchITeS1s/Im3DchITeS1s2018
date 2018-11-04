<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Persona;
use App\Inscripcion;
use App\Resultado_Cuestionario;
use App\Ciclo;
use App\CarreraCurso;
use Auth;

class CuestionarioHistoricoAlumno extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alumno = Persona::where('id', Auth::user()->fkpersona)->first();
        $carreras = Inscripcion::join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
            ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
            ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
            ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
            ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
            ->where('inscripcion.fkpersona', $alumno->id)
            ->select('carrera.id as id', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion')
            ->get();
        $ciclos = Ciclo::select('id', 'nombre')->get();

        return view('blackboard.historicos.cuestionariosresueltosalumno', compact('alumno', 'carreras', 'ciclos'));
    }

    public function getdata($carrera, $curso, $anio)
    {
        $query = Resultado_Cuestionario::cuestionarioHistoricoAlumnos(Auth::user()->fkpersona, $carrera, $curso, $anio);

        return Datatables::of($query)
            ->addColumn('punteo', function ($data) {
                return $data->punteo_obtenido.' / '.$data->punteo_total;
            })       
            ->addColumn('fecha', function ($data) {
                return date('d/m/Y h:i:s', strtotime($data->fecha));
            })              
            ->addColumn('action', function ($data) {
                return '<button class="ver-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'">
                    <span class="fa fa-eye"></span></button>';
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }  

    public function dropCurso(Request $request, $id)
    {
        if($request->ajax()){
            $data = CarreraCurso::join('curso', 'carrera_curso.fkcurso', 'curso.id')
            ->where('fkcarrera', $id)->select('curso.*')->get();
            return response()->json($data);
        }        
    }       
}
