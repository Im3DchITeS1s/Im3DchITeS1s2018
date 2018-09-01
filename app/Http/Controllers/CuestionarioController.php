<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Cuestionario;
use App\CatedraticoCurso;
use App\PeriodoAcademico;
use App\TipoCuestionario;
use App\Prioridad;
use App\Estado;
use Auth;

class CuestionarioController extends Controller
{
    protected $verificar_insert =
    [
        'titulo' => 'required|max:100',
        'descripcion' => 'required|max:1000',
        'punteo' => 'required|numeric|between:0,100',
        'fkperiodo_academico' => 'required|integer',
        'fktipo_cuestionario' => 'required|integer',   
        'fkprioridad' => 'required|integer',                     
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('blackboard/cuestionario');
    }

    public function dropcarreracatedratico(Request $request, $id)
    {
        $id = Auth::user()->fkpersona;
        if($request->ajax()){
            $data = CatedraticoCurso::buscarCursoCatedratico($id);
            return response()->json($data);
        }        
    }  

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $hora= date ("h:i:s");
        $fecha= date ("Y-m-d");
        $estado = Estado::buscarIDEstado(18);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Cuestionario();
            $insert->titulo = $request->titulo;
            $insert->descripcion = $request->descripcion;
            $insert->fecha = $fecha." ".$hora;
            $insert->punteo = $request->punteo;
            $insert->fkcatedratico_curso = $request->fkcatedratico_curso;
            $insert->fkperiodo_academico = $request->fkperiodo_academico; 
            $insert->fktipo_cuestionario = $request->fktipo_cuestionario;
            $insert->fkprioridad = $request->fkprioridad;
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
