<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\CatedraticoCurso;
use App\Formato_Documento;
use App\Estado;
use App\Catedratico_Contenido_Educativo;
use Auth;

class CatedraticoContenidoEducativoController extends Controller
{
    protected $verificar_insert =
    [
        'titulo' => 'required|max:50',
        'descripcion' => 'required|max:500',   
        'archivo' => 'required',
        'fkcatedratico_curso' => 'required|integer',   
        'fkformato_documento' => 'required|integer',                      
    ];

    protected $verificar_update =
    [
        'titulo' => 'required|max:50',
        'descripcion' => 'required|max:500',   
        'archivo' => 'required',
        'fkcatedratico_curso' => 'required|integer',   
        'fkformato_documento' => 'required|integer',                      
    ];    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('director', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('secretaria', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        $this->middleware('contador', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
        //$this->middleware('catedratico', ['only' => ['index', 'store', 'update']]);
        $this->middleware('alumno', ['only' => ['index', 'store', 'update', 'cambiarEstado']]);
    }

    public function index()
    {
        return view('/blackboard/cargarcontenidocatedratico');
    }

    public function getdata()
    {
        $color_estado = "";

        $query = Catedratico_Contenido_Educativo::dataContenidoEducativoCatedratico();

        return Datatables::of($query)
            ->addColumn('tarea', function ($data) {
                if($data->responder == 1)
                {
                    return "SI";
                }
                else
                {
                    return "NO";                    
                }
            })          
            ->addColumn('action', function ($data) {
                $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-responder="'.$data->responder.'" data-formato="'.$data->formato.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkformato_documento="'.$data->fkformato_documento.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function getdataID($id)
    {
        $color_estado = "";

        $query = Catedratico_Contenido_Educativo::dataContenidoEducativoCatedraticoID($id);

        return Datatables::of($query)
            ->addColumn('tarea', function ($data) {
                if($data->responder == 1)
                {
                    return "SI";
                }
                else
                {
                    return "NO";                    
                }
            })          
            ->addColumn('action', function ($data) {
                $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-responder="'.$data->responder.'" data-formato="'.$data->formato.'" data-fkcatedratico_curso="'.$data->fkcatedratico_curso.'" data-fkformato_documento="'.$data->fkformato_documento.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }         

    public function dropInformacionCatedratico(Request $request)
    {
        if($request->ajax()){
            $informacion = CatedraticoCurso::buscarInformacionCatedratico(Auth::user()->fkpersona);
            return response()->json($informacion);
        }        
    }

    public function dropFormato(Request $request)
    {
        if($request->ajax()){
            $informacion = Formato_Documento::dropFormatoDocumento();
            return response()->json($informacion);
        }        
    }    

    public function create()
    {
        //
    }

    public function store(Request $request)
    {     
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Catedratico_Contenido_Educativo();
            $insert->titulo = $request->titulo;  
            $insert->descripcion = $request->descripcion; 
            $insert->archivo = $request->archivo;    
            $insert->responder = $request->responder;                  
            $insert->fkcatedratico_curso = $request->fkcatedratico_curso; 
            $insert->fkformato_documento = $request->fkformato_documento;                   
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
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_update);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambio = Catedratico_Contenido_Educativo::findOrFail($id);
            $cambio->titulo = $request->titulo;  
            $cambio->descripcion = $request->descripcion; 
            $cambio->archivo = $request->archivo;    
            $cambio->responder = $request->responder;                  
            $cambio->fkcatedratico_curso = $request->fkcatedratico_curso; 
            $cambio->fkformato_documento = $request->fkformato_documento;
            $cambio->save();
            return response()->json($cambio);
        }
    }

    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = Catedratico_Contenido_Educativo::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    
}
