<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Persona;
use App\EncargadoAlumno;
use App\Estado;


class EncargadoAlumnoController extends Controller
{
   
   protected $verificar_insert = 
   [

   	 'fkalumno' => 'required|integer', 
     'fkencargado' => 'required|integer', 

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
        return view('/academico/encargadoalumno/encargadoalumno');
    }


    public function getdata()
    {
   
        return Datatables::of($query)
             ->addColumn('alumno', function ($data) {
                return $data->alumno_nombre1." ".$data->alumno_nombre2." ".$data->alumno_apellido1." ".$data->alumno_apellido2;
            })->make(true);
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
            $insert = new EncargadoAlumno();            
            $insert->fkalumno = $request->fkalumno;
            $insert->fkencargado = $request->fkencargado;           
            $insert->fkestado = $estado->id;                                                                           
            $insert->save();
            return response()->json($insert);
        }        
    }

    public function show($id)
    {
     
    }

     public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Inscripcion::findOrFail($id);            
            $cambiar->fkalumno = $request->fkalumno;
            $cambiar->fkencargado = $request->fkencargado;    
            $cambiar->save();
            return response()->json($cambiar); 
        }       
    }     

    public function edit($id)
    {
        
    }


  public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = EncargadoAlumno::findOrFail($request->pkencargadoalumno); 
        $cambiar->fkalumno = $request->fkalumno;
        $cambiar->fkencargado = $request->fkencargado;  
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
     
    }

}

