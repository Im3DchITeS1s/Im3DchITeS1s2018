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

    public function __construct()
    {
        $this->middleware('auth');
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
                switch ($data->fkestado)
                 {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-titulo="'.$data->titulo.'" data-descripcion="'.$data->descripcion.'" data-responder="'.$data->responder.'" data-formato="'.$data->formato.'"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-nombre="'.$data->nombre.'" data-fkestado="'.$data->id_estado.'">
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
