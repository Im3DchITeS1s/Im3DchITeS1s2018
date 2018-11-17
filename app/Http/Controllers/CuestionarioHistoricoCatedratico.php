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
        $this->middleware('admin', ['only' => ['index']]);
        $this->middleware('director', ['only' => ['index']]);
        $this->middleware('secretaria', ['only' => ['index']]);
        $this->middleware('contador', ['only' => ['index']]);
        //$this->middleware('catedratico', ['only' => ['index']]);
        $this->middleware('alumno', ['only' => ['index']]);
    }

    public function index()
    {
        $catedratico = Persona::where('id', Auth::user()->fkpersona)->first();
        $carreras = CatedraticoCurso::buscarCursoCatedratico(Auth::user()->fkpersona);
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
            $data = Cuestionario::where('fkcatedratico_curso', $id)->where('fkestado', '!=', 23)->select('cuestionario.*')->get();
            return response()->json($data);
        }        
    }      
}
