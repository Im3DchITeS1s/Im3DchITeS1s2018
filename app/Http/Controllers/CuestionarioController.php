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
        'fkcatedratico_curso' => 'required',              
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('blackboard/cuestionario');
    }

    public function getdataCuestionarioCreado()
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");
        $query = Cuestionario::dataCuestionarioCicloCatedratico($idPersona, 18, $ciclo);

        return Datatables::of($query)     
            ->addColumn('documento', function ($data) {
                return $data->tipo_cuestionario.' de '.$data->curso.' /'.$data->ciclo;
            }) 
            ->addColumn('carrera_grado', function ($data) {
                return $data->grado.' '.$data->carrera.'/'.$data->seccion;
            })                         
            ->addColumn('action', function ($data) {
                $prioridad = '<button class="btn btn-'.$data->color_prioridad.' btn-xs" type="button">'.$data->prioridad.'</button>';
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><small>edición</small></button>';

                return $prioridad.' <button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-punteo="'.$data->punteo.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fktipo_cuestionario="'.$data->fktipo_cuestionario.'" data-fkprioridad="'.$data->fkprioridad.'" data-fkestado="'.$data->fkestado.'" data-carrera="'.$data->carrera.'" data-curso="'.$data->curso.'" data-grado="'.$data->grado.'" data-seccion="'.$data->seccion.'" data-periodo_academico="'.$data->periodo_academico.'" data-ciclo="'.$data->ciclo.'" data-tipo_periodo="'.$data->tipo_periodo.'" data-prioridad="'.$data->prioridad.'" data-color_prioridad="'.$data->color_prioridad.'"  data-estado="'.$data->estado.'" data-tipo_cuestionario="'.$data->tipo_cuestionario.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$btn_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function getdataCuestionarioEdicion()
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");
        $query = Cuestionario::dataCuestionarioCicloCatedratico($idPersona, 19, $ciclo);

        return Datatables::of($query)     
            ->addColumn('documento', function ($data) {
                return $data->tipo_cuestionario.' de '.$data->curso.' /'.$data->ciclo;
            }) 
            ->addColumn('carrera_grado', function ($data) {
                return $data->grado.' '.$data->carrera.'/'.$data->seccion;
            })                         
            ->addColumn('action', function ($data) {
                $prioridad = '<button class="btn btn-'.$data->color_prioridad.' btn-xs" type="button">'.$data->prioridad.'</button>';
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><small>listo</small></button>';

                return $prioridad.' <button class="pregunta-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-punteo="'.$data->punteo.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fktipo_cuestionario="'.$data->fktipo_cuestionario.'" data-fkprioridad="'.$data->fkprioridad.'" data-fkestado="'.$data->fkestado.'" data-carrera="'.$data->carrera.'" data-curso="'.$data->curso.'" data-grado="'.$data->grado.'" data-seccion="'.$data->seccion.'" data-periodo_academico="'.$data->periodo_academico.'" data-ciclo="'.$data->ciclo.'" data-tipo_periodo="'.$data->tipo_periodo.'" data-prioridad="'.$data->prioridad.'" data-color_prioridad="'.$data->color_prioridad.'"  data-estado="'.$data->estado.'" data-tipo_cuestionario="'.$data->tipo_cuestionario.'">
                    <span class="fa fa-question"></span></button> '.$btn_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }  

    public function getdataCuestionarioListo()
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");
        $query = Cuestionario::dataCuestionarioCicloCatedratico($idPersona, 20, $ciclo);

        return Datatables::of($query)     
            ->addColumn('documento', function ($data) {
                return $data->tipo_cuestionario.' de '.$data->curso.' /'.$data->ciclo;
            }) 
            ->addColumn('carrera_grado', function ($data) {
                return $data->grado.' '.$data->carrera.'/'.$data->seccion;
            })                         
            ->addColumn('action', function ($data) {
                $prioridad = '<button class="btn btn-'.$data->color_prioridad.' btn-xs" type="button">'.$data->prioridad.'</button>';
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><small>publicar</small></button>';

                return $prioridad.' <button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-punteo="'.$data->punteo.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fktipo_cuestionario="'.$data->fktipo_cuestionario.'" data-fkprioridad="'.$data->fkprioridad.'" data-fkestado="'.$data->fkestado.'" data-carrera="'.$data->carrera.'" data-curso="'.$data->curso.'" data-grado="'.$data->grado.'" data-seccion="'.$data->seccion.'" data-periodo_academico="'.$data->periodo_academico.'" data-ciclo="'.$data->ciclo.'" data-tipo_periodo="'.$data->tipo_periodo.'" data-prioridad="'.$data->prioridad.'" data-color_prioridad="'.$data->color_prioridad.'"  data-estado="'.$data->estado.'" data-tipo_cuestionario="'.$data->tipo_cuestionario.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$btn_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    } 

    public function getdataCuestionarioPublicado()
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");
        $query = Cuestionario::dataCuestionarioCicloCatedratico($idPersona, 21, $ciclo);

        return Datatables::of($query)     
            ->addColumn('documento', function ($data) {
                return $data->tipo_cuestionario.' de '.$data->curso.' /'.$data->ciclo;
            }) 
            ->addColumn('carrera_grado', function ($data) {
                return $data->grado.' '.$data->carrera.'/'.$data->seccion;
            })                         
            ->addColumn('action', function ($data) {
                $prioridad = '<button class="btn btn-'.$data->color_prioridad.' btn-xs" type="button">'.$data->prioridad.'</button>';
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><small>restringir</small></button>';

                return $prioridad.' <button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-punteo="'.$data->punteo.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fktipo_cuestionario="'.$data->fktipo_cuestionario.'" data-fkprioridad="'.$data->fkprioridad.'" data-fkestado="'.$data->fkestado.'" data-carrera="'.$data->carrera.'" data-curso="'.$data->curso.'" data-grado="'.$data->grado.'" data-seccion="'.$data->seccion.'" data-periodo_academico="'.$data->periodo_academico.'" data-ciclo="'.$data->ciclo.'" data-tipo_periodo="'.$data->tipo_periodo.'" data-prioridad="'.$data->prioridad.'" data-color_prioridad="'.$data->color_prioridad.'"  data-estado="'.$data->estado.'" data-tipo_cuestionario="'.$data->tipo_cuestionario.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$btn_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }    

    public function getdataCuestionarioRestringido()
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");
        $query = Cuestionario::dataCuestionarioCicloCatedratico($idPersona, 22, $ciclo);

        return Datatables::of($query)     
            ->addColumn('documento', function ($data) {
                return $data->tipo_cuestionario.' de '.$data->curso.' /'.$data->ciclo;
            }) 
            ->addColumn('carrera_grado', function ($data) {
                return $data->grado.' '.$data->carrera.'/'.$data->seccion;
            })                         
            ->addColumn('action', function ($data) {
                $prioridad = '<button class="btn btn-'.$data->color_prioridad.' btn-xs" type="button">'.$data->prioridad.'</button>';
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><small>inactivo</small></button>';

                return $prioridad.' <button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-punteo="'.$data->punteo.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fktipo_cuestionario="'.$data->fktipo_cuestionario.'" data-fkprioridad="'.$data->fkprioridad.'" data-fkestado="'.$data->fkestado.'" data-carrera="'.$data->carrera.'" data-curso="'.$data->curso.'" data-grado="'.$data->grado.'" data-seccion="'.$data->seccion.'" data-periodo_academico="'.$data->periodo_academico.'" data-ciclo="'.$data->ciclo.'" data-tipo_periodo="'.$data->tipo_periodo.'" data-prioridad="'.$data->prioridad.'" data-color_prioridad="'.$data->color_prioridad.'"  data-estado="'.$data->estado.'" data-tipo_cuestionario="'.$data->tipo_cuestionario.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$btn_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }  

    public function getdataCuestionarioInactivo()
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");
        $query = Cuestionario::dataCuestionarioCicloCatedratico($idPersona, 23, $ciclo);

        return Datatables::of($query)     
            ->addColumn('documento', function ($data) {
                return $data->tipo_cuestionario.' de '.$data->curso.' /'.$data->ciclo;
            }) 
            ->addColumn('carrera_grado', function ($data) {
                return $data->grado.' '.$data->carrera.'/'.$data->seccion;
            })                         
            ->addColumn('action', function ($data) {
                $prioridad = '<button class="btn btn-'.$data->color_prioridad.' btn-xs" type="button">'.$data->prioridad.'</button>';
                $btn_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><small>creado</small></button>';

                return $prioridad.' <button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-punteo="'.$data->punteo.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkperiodo_academico="'.$data->fkperiodo_academico.'" data-fktipo_cuestionario="'.$data->fktipo_cuestionario.'" data-fkprioridad="'.$data->fkprioridad.'" data-fkestado="'.$data->fkestado.'" data-carrera="'.$data->carrera.'" data-curso="'.$data->curso.'" data-grado="'.$data->grado.'" data-seccion="'.$data->seccion.'" data-periodo_academico="'.$data->periodo_academico.'" data-ciclo="'.$data->ciclo.'" data-tipo_periodo="'.$data->tipo_periodo.'" data-prioridad="'.$data->prioridad.'" data-color_prioridad="'.$data->color_prioridad.'"  data-estado="'.$data->estado.'" data-tipo_cuestionario="'.$data->tipo_cuestionario.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$btn_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function contadorEstadoCuestionario(Request $request, $id)
    {
        $idPersona = Auth::user()->fkpersona;
        $ciclo = date ("Y");

        if($request->ajax()){
            $query = Cuestionario::contadorEstadoCuestionario($idPersona, $id, $ciclo);
            $data = count($query);
            return response()->json($data);
        }        
    }                    

    public function dropcarreracatedratico(Request $request, $id)
    {
        $id = Auth::user()->fkpersona;
        if($request->ajax()){
            $data = CatedraticoCurso::buscarCursoCatedratico($id);
            return response()->json($data);
        }        
    }  

    public function droptipocuestionario(Request $request, $id)
    {
        if($request->ajax()){
            $data = TipoCuestionario::buscarTipoCuestionario($id);
            return response()->json($data);
        }        
    }   

    public function dropperiodoacademico(Request $request, $id)
    {
        if($request->ajax()){
            $data = PeriodoAcademico::buscarPeriodoAcademico($id);
            return response()->json($data);
        }        
    }   

    public function dropprioridad(Request $request, $id)
    {
        if($request->ajax()){
            $data = Prioridad::buscarPrioridad($id);
            return response()->json($data);
        }        
    }        

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(18);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            foreach ($request->fkcatedratico_curso as $fkcatedratico_curso) {
                $insert = new Cuestionario();
                $insert->titulo = $request->titulo;
                $insert->descripcion = $request->descripcion;
                $insert->punteo = $request->punteo;
                $insert->fkcatedratico_curso = $fkcatedratico_curso;
                $insert->fkperiodo_academico = $request->fkperiodo_academico; 
                $insert->fktipo_cuestionario = $request->fktipo_cuestionario;
                $insert->fkprioridad = $request->fkprioridad;
                $insert->fkestado = $estado->id;                                    
                $insert->save();
            }
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
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Cuestionario::findOrFail($id); 
            $cambiar->titulo = $request->titulo;
            $cambiar->descripcion = $request->descripcion;
            $cambiar->punteo = $request->punteo;
            $cambiar->fkcatedratico_curso = $request->fkcatedratico_curso;
            $cambiar->fkperiodo_academico = $request->fkperiodo_academico; 
            $cambiar->fktipo_cuestionario = $request->fktipo_cuestionario;
            $cambiar->fkprioridad = $request->fkprioridad;                                   
            $cambiar->save();

            return response()->json($cambiar);
        }
    }

    public function cambiarEstado(Request $request)
    {
        switch ($request->fkestado) {
            case 18:
                $estado = Estado::buscarIDEstado(19);
                break;
            
            case 19:
                $estado = Estado::buscarIDEstado(20);
                break;

            case 20:
                $estado = Estado::buscarIDEstado(21);
                break;

            case 21:
                $estado = Estado::buscarIDEstado(22);
                break;    

            case 22:
                $estado = Estado::buscarIDEstado(23);
                break; 

            case 23:
                $estado = Estado::buscarIDEstado(18);
                break;                                                              
        }

        $cambiar = Cuestionario::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }   

    public function destroy($id)
    {
        //
    }
}
