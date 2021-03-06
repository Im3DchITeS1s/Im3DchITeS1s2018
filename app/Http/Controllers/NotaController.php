<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Inscripcion;
use App\PeriodoAcademico;
use App\CantidadAlumno;
use App\CatedraticoCurso;
use App\CarreraCurso;
use App\CarreraGrado;
use App\Ciclo;
use App\Carrera;
use App\Grado;
use App\Curso;
use App\Nota;
use App\Estado;


class NotaController extends Controller
{
    protected $verificar_insert =
    [
        'fkinscripcion' => 'required|integer', 
        'fkperiodo_academico' => 'required|integer', 
        'fkcarrera_curso'=>'required|integer', 
        'nota'=>'required|numeric|between:1,100', 
    ];

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('director', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('secretaria', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('contador', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('catedratico', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('alumno', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
    }

    public function index()
    {
        $carreras = CantidadAlumno::join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
                                ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
                                ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
                                ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
                                ->where('cantidad_alumno.fkestado', 5)
                                ->select('cantidad_alumno.id as id', 'grado.nombre as grado', 'carrera.nombre as carrera', 'seccion.letra as seccion')->orderBy('carrera.nombre')->get();

        $ciclos = Ciclo::select('id', 'nombre')->get();

        $periodos = PeriodoAcademico::join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')
                            ->where('periodo_academico.fkestado', 5)->where('periodo_academico.fkestado', 5)
                            ->select('periodo_academico.id as id', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo')->orderBy('periodo_academico.id', 'asc')->get();

        return view('/academico/nota/nota', compact('carreras', 'ciclos', 'periodos'));   
    }
    
    public function getdata($carrera, $curso, $anio, $bimestre)
    {
        $query = Inscripcion::alumnosAgregarNota($carrera, $curso, $anio, $bimestre);

        return Datatables::of($query)
            ->addColumn('alumno', function ($data) {
                return $data->nombre1." ".$data->nombre2." ".$data->apellido1." ".$data->apellido2;
            }) 
            ->addColumn('nota1', function ($data) {
                $nota = 0;

                $buscar_nota = Nota::buscarNotaAluno($data->id, 1, $data->carrera_curso);

                if(!is_null($buscar_nota))
                {
                    $nota = $buscar_nota->nota;
                }

                return $nota;
            }) 
            ->addColumn('nota2', function ($data) {
                $nota = 0;

                $buscar_nota = Nota::buscarNotaAluno($data->id, 2, $data->carrera_curso);

                if(!is_null($buscar_nota))
                {
                    $nota = $buscar_nota->nota;
                }

                return $nota;
            }) 
            ->addColumn('nota3', function ($data) {
                $nota = 0;

                $buscar_nota = Nota::buscarNotaAluno($data->id, 3, $data->carrera_curso);

                if(!is_null($buscar_nota))
                {
                    $nota = $buscar_nota->nota;
                }

                return $nota;
            }) 
            ->addColumn('nota4', function ($data) {
                $nota = 0;

                $buscar_nota = Nota::buscarNotaAluno($data->id, 4, $data->carrera_curso);

                if(!is_null($buscar_nota))
                {
                    $nota = $buscar_nota->nota;
                }

                return $nota;
            })  
            ->addColumn('promedio_actual', function ($data) {
                $nota = 0;

                $promedios_actuales = Nota::select('nota')->where('fkinscripcion', $data->id)->where('fkcarrera_curso', $data->carrera_curso)->where('fkestado', 5)->get();

                foreach ($promedios_actuales as $promedio_actual) 
                {
                    $nota = $promedio_actual->nota + $nota;
                }

                if($nota > count($promedios_actuales))
                {
                    $nota = $nota / count($promedios_actuales);
                }

                return $nota;
            }) 
            ->addColumn('promedio_final', function ($data) {
                $nota = 0;

                $promedios_actuales = Nota::select('nota')->where('fkinscripcion', $data->id)->where('fkcarrera_curso', $data->carrera_curso)->where('fkestado', 5)->get();

                foreach ($promedios_actuales as $promedio_actual) 
                {
                    $nota = $promedio_actual->nota + $nota;
                }

                if($nota > count($promedios_actuales))
                {
                    $nota = $nota / 4;
                }

                return $nota;
            })                         
           ->addColumn('action', function ($data) {
                $bimestre = intval($data->bimestre);
                $agregar_nota = '';
                $imprimir = '';
                $eliminar = '';

                $buscar_nota = Nota::buscarNotaAluno($data->id, $bimestre, $data->carrera_curso);
                $imprimir_promedio = Nota::buscarNotaAlumnoPromedio($data->id, $data->carrera_curso);

                if(is_null($buscar_nota))
                {
                    $agregar_nota = '<button class="agregar-nota btn btn-success btn-xs" type="button" data-fkinscripcion="'.$data->id.'" data-fkcarrera_curso="'.$data->carrera_curso.'" data-nombre="'.$data->nombre1." ".$data->nombre2." ".$data->apellido1." ".$data->apellido2.'">Agregar Nota</button>';
                }
                else
                {
                    $eliminar = '<button class="eliminar-nota btn btn-danger btn-xs" type="button" data-id="'.$buscar_nota->id.'">Eliminar</button>';
                }

                if(count($imprimir_promedio) > 2)
                {
                    $imprimir = '<button class="imprimir-nota btn btn-warning btn-xs" type="button" data-fkinscripcion="'.$data->id.'" data-fkcarrera_curso="'.$data->carrera_curso.'">Imprimir</button>';
                }

                return $agregar_nota.' '.$imprimir.' '.$eliminar;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function dropCurso(Request $request, $id)
    {
        if($request->ajax()){
            $data = CantidadAlumno::join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
                    ->join('carrera_curso', 'carrera_grado.fkcarrera', 'carrera_curso.fkcarrera')
                    ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
                    ->where('curso.fkestado', 5)
                    ->where('cantidad_alumno.id', $id)
                    ->select('carrera_curso.id as id', 'curso.nombre as nombre')->orderBy('curso.nombre')->get();
            return response()->json($data);
        }        
    } 
 
    public function create()
    {
      
    }

    public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            $buscar_notar = Nota::buscarNotaAluno($request->fkinscripcion, $request->fkperiodo_academico, $request->fkcarrera_curso);

            if(is_null($buscar_notar))
            {
                $insert = new Nota();         
                $insert->fkinscripcion = $request->fkinscripcion;
                $insert->fkperiodo_academico = $request->fkperiodo_academico;           
                $insert->fkcarrera_curso = $request->fkcarrera_curso; 
                $insert->nota = $request->nota;         
                $insert->fkestado = $estado->id;                                                                           
                $insert->save();
                return response()->json($insert);                
            }

            return response()->json($buscar_notar); 
        }        
    }

    public function show($id)
    {
        $alumno = Inscripcion::join('persona', 'inscripcion.fkpersona', 'persona.id')
                ->join('genero', 'persona.fkgenero', 'genero.id')
                ->join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
                ->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
                ->join('grado', 'carrera_grado.fkgrado', 'grado.id')
                ->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
                ->join('carrera_curso', 'carrera.id', 'carrera_curso.fkcarrera')
                ->join('curso', 'carrera_curso.fkcurso', 'curso.id')
                ->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
                ->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
                ->where('inscripcion.id', $id)
                ->where('ciclo.nombre', date('Y'))
                ->select('persona.codigo', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'genero.nombre as genero', 'carrera.nombre as carrera', 'grado.nombre as grado',  'seccion.letra as seccion', 'curso.nombre as curso', 'ciclo.nombre as ciclo', 'carrera.id as fkcarrera', 'cantidad_alumno.id as fkcantidad_alumno', 'genero.id as fkgenero', 'inscripcion.id as fkinscripcion')->first(); 

        $catedratico = CatedraticoCurso::join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', 'cantidad_alumno.id')
                ->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
                ->where('catedratico_curso.fkestado', 5)
                ->where('catedratico_curso.fkcantidad_alumno', $alumno->fkcantidad_alumno)
                ->select('persona.codigo', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2')->first(); 

        $cursos = CarreraCurso::join('curso', 'carrera_curso.fkcurso', 'curso.id')
                    ->where('carrera_curso.fkestado', 5)
                    ->where('carrera_curso.fkcarrera', $alumno->fkcarrera)
                    ->select('curso.nombre as curso', 'carrera_curso.id as id')
                    ->orderBy('curso.nombre', 'asc')->get();

        $promedios_actuales = Nota::select('nota.*', 'fkcarrera_curso as fkcurso', \DB::raw("(SELECT n.nota FROM nota n
                              WHERE n.fkinscripcion = '".$alumno->fkinscripcion."' AND n.fkperiodo_academico = 1 AND n.fkcarrera_curso = nota.fkcarrera_curso AND n.fkestado = 5 ) as nota1"), \DB::raw("(SELECT n.nota FROM nota n
                              WHERE n.fkinscripcion = '".$alumno->fkinscripcion."' AND n.fkperiodo_academico = 2 AND n.fkcarrera_curso = nota.fkcarrera_curso AND n.fkestado = 5 ) as nota2"), \DB::raw("(SELECT n.nota FROM nota n
                              WHERE n.fkinscripcion = '".$alumno->fkinscripcion."' AND n.fkperiodo_academico = 3 AND n.fkcarrera_curso = nota.fkcarrera_curso AND n.fkestado = 5 ) as nota3"), \DB::raw("(SELECT n.nota FROM nota n
                              WHERE n.fkinscripcion = '".$alumno->fkinscripcion."' AND n.fkperiodo_academico = 4 AND n.fkcarrera_curso = nota.fkcarrera_curso AND n.fkestado = 5 ) as nota4"))
                            ->where('nota.fkinscripcion', $alumno->fkinscripcion)
                            ->where('nota.fkestado', 5)->groupBy('fkcarrera_curso')->get();              

        $pdf = \PDF::loadView('academico.reporte.notaalumno', compact('alumno', 'catedratico', 'cursos', 'promedios_actuales'));

        return $pdf->download('nota_del_alumno_'.$alumno->nombre1.'_'.$alumno->apellido1.' '. date('d-m-Y h:i:s') .'.pdf');                 
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
    
    }

    public function destroy($id)
    {
        //
    }
    
    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = Nota::findOrFail($request->pknota); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }
}
