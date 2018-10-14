<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\PeriodoAcademico;
use App\TipoPeriodo;
use App\Estado;

class PeriodoAcademicoController extends Controller
{
     protected $verificar_insert =
    [
        'nombre' => 'required|max:20',
       	'inicio' => 'required', 
        'fin' => 'required', 
        'fktipo_periodo' => 'required|integer', 
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        return view('/mantenimiento/PeriodoAcademico/periodoacademico');
    }

     public function getdata()
    {
        $color_estado = "";
        $query = PeriodoAcademico::dataPeriodoAcademico();
        return Datatables::of($query)
            ->addColumn('action', function ($periodoacademico) {
                switch ($periodoacademico->id_estado) {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$periodoacademico->id.'" data-estado="activo"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$periodoacademico->id.'" data-estado="inactivo"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$periodoacademico->id.'" data-nombre="'.$periodoacademico->nombre.'" data-inicio="'.$periodoacademico->inicio.'" data-fin="'.$periodoacademico->fin.'" data-fktipo_periodo="'.$periodoacademico->fktipo_periodo.'" data-fkestado="'.$periodoacademico->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function droptiperiodo(Request $request, $id)
    {
        if($request->ajax()){
            $estado = TipoPeriodo::buscarTipoPeriodo($id);
            return response()->json($estado);
        }        
    }  

    public function dropestado(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Estado::buscarEstadoPadre($id);
            return response()->json($estado);
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
            $insert = new PeriodoAcademico();
            $insert->nombre = $request->nombre;
            $insert->inicio = date("Y-m-d", strtotime($request->inicio));
            $insert->fin = date("Y-m-d", strtotime($request->fin));
			$insert->fktipo_periodo = $request->fktipo_periodo;
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
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = PeriodoAcademico::findOrFail($id);  
            $cambiar->nombre = $request->nombre;
            $cambiar->inicio = date("Y-m-d", strtotime($request->inicio)); 
            $cambiar->fin =date("Y-m-d", strtotime($request->fin)); 
        	$cambiar->fktipo_periodo = $request->fktipo_periodo;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);
        $cambiar = PeriodoAcademico::findOrFail($request->pkperiodoacademico); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
      
    }
	 
}
