<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Persona;
use App\CatedraticoCurso;
use App\Resultado_Cuestionario;
use App\Ciclo;
use App\Cuestionario;
use Auth;

class CuestionarioHistoricoCatedratico extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
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
            ->select('catedratico_curso.id as id', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')
            ->get();
        $ciclos = Ciclo::select('id', 'nombre')->get();

        return view('blackboard.historicos.cuestionariosresueltoscatedratico', compact('catedratico', 'carreras', 'ciclos'));
    }

    public function getdata($carrera, $cuestionario, $anio)
    {
        $query = Resultado_Cuestionario::cuestionarioHistoricoCatedraticos($carrera, $cuestionario, $anio);

        return Datatables::of($query)
            ->addColumn('punteo', function ($data) {
                return $data->punteo_obtenido.' / '.$data->punteo_original;
            })       
            ->addColumn('fecha', function ($data) {
                return date('d/m/Y h:i:s', strtotime($data->fecha));
            })    
            ->addColumn('alumno', function ($data) {
                return $data->nombre1.' '.$data->nombre2.' '.$data->apellido1.' '.$data->apellido2;
            })   
            ->addColumn('carrera_curso', function ($data) {
                return $data->carrera.' '.$data->curso;
            })                                       
            ->addColumn('action', function ($data) {
                return '<button class="ver-modal btn btn-success btn-xs" type="button" data-id_cuestionario="'.$data->id_cuestionario.'" data-id_persona="'.$data->id_persona.'">
                    <span class="fa fa-eye"></span></button>';
            })       
            ->editColumn('id_cuestionario', 'ID: {{$id_cuestionario}}')       
            ->make(true);
    }  

    public function dropCuestionario(Request $request, $id)
    {
        if($request->ajax()){
            $data = Cuestionario::where('fkcatedratico_curso', $id)->select('cuestionario.*')->get();
            return response()->json($data);
        }        
    }      
}
