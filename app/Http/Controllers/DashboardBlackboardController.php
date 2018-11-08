<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catedratico_Contenido_Educativo;
use App\Inscripcion;
use App\VistaContenido;
use App\CatedraticoCurso;
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
        $catedratico_cusos = CatedraticoCurso::join('persona', 'catedratico_curso.fkpersona', 'persona.id')
            ->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
            ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
            ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
            ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
            ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
            ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
            ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
            ->where('catedratico_curso.fkpersona', Auth::user()->fkpersona)
            ->select('catedratico_curso.*', 'cantidad_alumno.cantidad as cantidad', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')->get();

        $alumno = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));

        if(is_null($alumno)) {
            $fkcantidad_alumno = 0;
            $id = 0;
        }
        else {
            $fkcantidad_alumno = $alumno->fkcantidad_alumno;
            $id = $alumno->id;
        }

        $contenidos = Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
        ->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
        ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        ->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
        ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
        ->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
        ->where('catedratico_contenido_educativo.fkestado', 5)
        ->where('catedratico_curso.fkcantidad_alumno', $fkcantidad_alumno)
        ->select('catedratico_contenido_educativo.id as id', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'carrera.nombre as carrera', 'curso.nombre as curso', 'formato_documento.icono as icono', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.responder as responder', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.created_at as fecha')
        ->latest('catedratico_contenido_educativo.created_at')->take(20)->get();

        $vistos = VistaContenido::where('fkinscripcion', $id)->latest()->take(50)->get();            

        return view('blackboard.dashboardblackboard', compact('contenidos', 'vistos', 'catedratico_cusos'));
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
