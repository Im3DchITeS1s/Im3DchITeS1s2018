<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use App\Alumno_Cuestionario_Respuesta;
use App\Inscripcion;
use Auth;

class AlumnoCuestionarRespuestaController extends Controller
{
    protected $verificar_insert =
    [
        'fkcuestionario' => 'required|integer',
        'fkpregunta' => 'required|integer',   
        'fkrespuesta' => 'required|integer',              
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function cuestionariosPreguntasRespuestas(Request $request, $id)
    {
        if($request->ajax()){
            $inscrito = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));
            if(!is_null($inscrito))
            {
                $data = Alumno_Cuestionario_Respuesta::resuletoCuestionarioPreguntaRespuestas($id, $inscrito->id);
                return response()->json($data);                
            }
            else
            {
                return response()->json($data);
            }
        }        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $inscrito = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));
            if(!is_null($inscrito))
            {
                $insert = new Alumno_Cuestionario_Respuesta();
                $insert->fkcuestionario = $request->fkcuestionario;
                $insert->fkinscripcion = $inscrito->id;
                $insert->fkpregunta = $request->fkpregunta;
                $insert->fkrespuesta = $request->fkrespuesta;                                 
                $insert->save();

                return response()->json($insert);
            }
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
        $inscrito = Inscripcion::alumnoInscrito(Auth::user()->fkpersona, date('Y'));

        if(!is_null($inscrito))
        {
            $datos = Alumno_Cuestionario_Respuesta::cuestionariosEliminar($id, $inscrito->id);

            foreach ($datos as $dato) {
                $eliminar = Alumno_Cuestionario_Respuesta::findOrFail($dato->id);
                $eliminar->delete();
            }
        }
    }
}
