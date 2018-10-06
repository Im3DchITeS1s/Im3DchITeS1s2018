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
