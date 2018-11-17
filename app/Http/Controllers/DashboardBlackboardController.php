<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catedratico_Contenido_Educativo;
use App\Inscripcion;
use App\CatedraticoCurso;
use App\Sistema_Rol_Usuario;
use App\VistaContenido;
use Auth;

class DashboardBlackboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index']]);
        $this->middleware('director', ['only' => ['index']]);
        $this->middleware('secretaria', ['only' => ['index']]);
        $this->middleware('contador', ['only' => ['index']]);
        //$this->middleware('catedratico', ['only' => ['index']]);
        //$this->middleware('alumno', ['only' => ['index']]);
    }

    public function index()
    {
        $rol = Sistema_Rol_Usuario::rolPersonaLoguea(Auth::user()->id);
        $alumno = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));        
        $catedratico_cusos = CatedraticoCurso::buscarCursoCatedratico(Auth::user()->fkpersona);
        $contenidoscatedratico = Catedratico_Contenido_Educativo::mostrarContenidoDashboardCatedratico();

        if(is_null($alumno)) {
            $fkcantidad_alumno = 0;
            $id = 0;
        }
        else {
            $fkcantidad_alumno = $alumno->fkcantidad_alumno;
            $id = $alumno->id;
        }

        $contenidos = Catedratico_Contenido_Educativo::contenidoParaAlumnoLoguea(0, $fkcantidad_alumno);
        $tareas = Catedratico_Contenido_Educativo::contenidoParaAlumnoLoguea(1, $fkcantidad_alumno);   
        $vistos = VistaContenido::contenidoVistoAlumno($id);      

        return view('blackboard.dashboardblackboard', compact('contenidos', 'tareas', 'vistos', 'catedratico_cusos', 'rol', 'contenidoscatedratico'));
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
