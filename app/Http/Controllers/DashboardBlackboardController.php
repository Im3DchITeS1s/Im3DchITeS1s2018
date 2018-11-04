<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catedratico_Contenido_Educativo;
use App\Inscripcion;
use App\VistaContenido;
use Auth;

class DashboardBlackboardController extends Controller
{
    public function index()
    {
        $alumno = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));
        $contenidos = Catedratico_Contenido_Educativo::join('catedratico_curso', 'catedratico_contenido_educativo.fkcatedratico_curso', 'catedratico_curso.id')
            ->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
            ->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
            ->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
            ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
            ->join('formato_documento', 'catedratico_contenido_educativo.fkformato_documento', 'formato_documento.id')
            ->where('catedratico_contenido_educativo.fkestado', 5)
            ->where('catedratico_curso.fkcantidad_alumno', $alumno->fkcantidad_alumno)
            ->select('catedratico_contenido_educativo.id as id', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'carrera.nombre as carrera', 'curso.nombre as curso', 'formato_documento.icono as icono', 'catedratico_contenido_educativo.archivo as archivo', 'catedratico_contenido_educativo.titulo as titulo', 'catedratico_contenido_educativo.responder as responder', 'catedratico_contenido_educativo.descripcion as descripcion', 'catedratico_contenido_educativo.created_at as fecha')
            ->latest('catedratico_contenido_educativo.created_at')->take(20)->get();

        $vistos = VistaContenido::where('fkinscripcion', $alumno->id)->latest()->take(50)->get();

        return view('blackboard.dashboardblackboard', compact('contenidos', 'vistos'));
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
