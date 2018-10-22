<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Persona;
use App\TipoPersona;
use App\PaisDepartamento;
use App\Genero;
use App\Estado;

class DocenteController extends Controller
{
    protected $verificar_insert =
    [
        'dpi' => 'required|max:15|unique:persona,nombre1,$id', 
        'nombre1' => 'required|max:20',  
        'nombre2' => 'max:20', 
        'nombre3' => 'max:20',
        'apellido1' => 'required|max:20',  
        'apellido2' => 'max:20', 
        'apellido3' => 'max:20', 
        'lugar' => 'max:100', 
        'fecha_nacimiento' => 'required', 
        'fktipo_persona' => 'required|integer', 
        'fkpais_departamento' => 'required|integer',      
        'fkgenero' => 'required|integer',                                                                            
    ];

    protected $verificar_update =
    [
        'dpi' => 'required|max:15|unique:persona,nombre1,$id', 
        'nombre1' => 'required|max:20',  
        'nombre2' => 'max:20', 
        'nombre3' => 'max:20',
        'apellido1' => 'required|max:20',  
        'apellido2' => 'max:20', 
        'apellido3' => 'max:20', 
        'lugar' => 'max:100', 
        'fecha_nacimiento' => 'required', 
        'fktipo_persona' => 'required|integer', 
        'fkpais_departamento' => 'required|integer',      
        'fkgenero' => 'required|integer',        
    ];    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        return view('academico/docente/docente');
    }

    public function getdata()
    {
        $query = Persona::dataInfoPersona(5);

        return Datatables::of($query)
            ->addColumn('nombre_completo', function ($data) {
                return $data->nombre1.' '.$data->nombre2.' '.$data->nombre3.' '.$data->apellido1.' '.$data->apellido2.' '.$data->apellido3;
            })        
            ->addColumn('action', function ($data) {
                $color_estado = "";
                $colot_btn = "";
                $icon = "";                
                $accion = "";
                switch ($data->fkestado) {
                    case 7:
                        $color_estado = 'success';
                        $colot_btn = 'warning';
                        $icon = 'fa fa-bolt';
                        $accion = 'activo';
                        break;
                    case 8:
                        $color_estado = 'primary';
                        $colot_btn = 'danger';
                        $icon = 'fa fa-thumbs-down';
                        $accion = 'inactivo';                        
                        break;
                    case 9:
                        $color_estado = 'danger';
                        $colot_btn = 'success';
                        $icon = 'fa fa-thumbs-up';
                        $accion = 'baja';                          
                        break;  
                    case 10:
                        $color_estado = 'warning';
                        $colot_btn = 'primary';
                        $icon = 'fa fa-exclamation-triangle';
                        $accion = 'suspender';                          
                        break;                                               
                }

                $btn_estado = '<button class="delete-modal btn btn-'.$colot_btn.' btn-xs" type="button" data-id="'.$data->id.'" data-accion="'.$accion.'"><span class="'.$icon.'"></span></button>';

                $btn_edit = '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-nombre1="'.$data->nombre1.'" data-nombre2="'.$data->nombre2.'" data-nombre3="'.$data->nombre3.'" data-apellido1="'.$data->apellido1.'" data-apellido2="'.$data->apellido2.'" data-apellido3="'.$data->apellido3.'" data-lugar="'.$data->lugar.'" data-fecha_nacimiento="'.$data->fecha_nacimiento.'"
                    data-fktipo_persona="'.$data->fktipo_persona.'" data-fkpais_departamento="'.$data->fkpais_departamento.'" data-fkgenero="'.$data->fkgenero.'" data-fkestado="'.$data->fkestado.'" data-codigo="'.$data->codigo.'" data-dpi="'.$data->dpi.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                $btn_show = '<button class="show-modal btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-nombre1="'.$data->nombre1.'" data-nombre2="'.$data->nombre2.'" data-nombre3="'.$data->nombre3.'" data-apellido1="'.$data->apellido1.'" data-apellido2="'.$data->apellido2.'" data-apellido3="'.$data->apellido3.'" data-lugar="'.$data->lugar.'" data-fecha_nacimiento="'.$data->fecha_nacimiento.'"
                    data-fktipo_persona="'.$data->fktipo_persona.'" data-fkpais_departamento="'.$data->fkpais_departamento.'" data-fkgenero="'.$data->fkgenero.'" data-fkestado="'.$data->fkestado.'" data-codigo="'.$data->codigo.'" data-dpi="'.$data->dpi.'">
                    <span class="glyphicon glyphicon-eye-open"></span></button>'; 

                return '<small class="label label-'.$color_estado.'">'.$data->estado.'</small> '.$btn_edit.' '.$btn_show.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function codigopersona(Request $request, $id)
    {
        if($request->ajax()){
            $estado = $this->crearCodigo($id);
            return response()->json($estado);
        }        
    } 

    public function existepersona(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Persona::existePersona($id);
            return response()->json($estado);
        }        
    }          

    public function droptipopersona(Request $request, $id)
    {
        if($request->ajax()){
            $estado = TipoPersona::buscarTipoPersona($id);
            return response()->json($estado);
        }        
    }    

    public function droppaisdepartamento(Request $request, $id)
    {
        if($request->ajax()){
            $estado = PaisDepartamento::buscarDepartamento($id);
            return response()->json($estado);
        }        
    }  

    public function droppais(Request $request, $id)
    {
        if($request->ajax()){
            $pais = PaisDepartamento::buscarIDPais($id);
            $estado = $pais->id;
            return response()->json($estado);
        }        
    }        

    public function dropgenero(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Genero::buscarGenero($id);
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
        $estado = Estado::buscarIDEstado(7);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Persona();
            $insert->codigo = $this->crearCodigo($request->fktipo_persona);
            $insert->dpi = $request->dpi;
            $insert->nombre1 = $request->nombre1;
            $insert->nombre2 = $request->nombre2;    
            $insert->nombre3 = $request->nombre3;
            $insert->apellido1 = $request->apellido1;  
            $insert->apellido2 = $request->apellido2;
            $insert->apellido3 = $request->apellido3;    
            $insert->lugar = $request->lugar;
            $insert->fecha_nacimiento = date("Y-m-d", strtotime($request->fecha_nacimiento));    
            $insert->fktipo_persona = $request->fktipo_person;
            $insert->fkpais_departamento = $request->fkpais_departamento;   
            $insert->fkgenero = $request->fkgenero;
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
        $validator = Validator::make(Input::all(), $this->verificar_update);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Persona::findOrFail($id);  
            $cambiar->dpi = $request->dpi;
            $cambiar->nombre1 = $request->nombre1;
            $cambiar->nombre2 = $request->nombre2;    
            $cambiar->nombre3 = $request->nombre3;
            $cambiar->apellido1 = $request->apellido1;  
            $cambiar->apellido2 = $request->apellido2;
            $cambiar->apellido3 = $request->apellido3;    
            $cambiar->lugar = $request->lugar;
            $cambiar->fecha_nacimiento = date("Y-m-d", strtotime($request->fecha_nacimiento));    
            $cambiar->fktipo_persona = $request->fktipo_persona;
            $cambiar->fkpais_departamento = $request->fkpais_departamento;   
            $cambiar->fkgenero = $request->fkgenero;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        switch ($request->accion) {
            case 'activo':
                $estado = Estado::buscarIDEstado(10);
                break;
            
            case 'inactivo':
                $estado = Estado::buscarIDEstado(9);
                break;

            case 'baja':
                $estado = Estado::buscarIDEstado(7);
                break;

            case 'suspender':
                $estado = Estado::buscarIDEstado(8);
                break;                                
        }

        $cambiar = Persona::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy($id)
    {
        //
    }

   public static function crearCodigo($id)
    {
        $correlativo = 0;

        $tipo_persona = TipoPersona::buscarIDTipoPersona($id);
        $incial =  strtoupper(substr($tipo_persona->nombre, 0, 3));

        $persona = Persona::where('fktipo_persona', $id)->orderby('codigo','DESC')->take(1)->first();

        if(count($persona) > 0) {
            $correlativo = substr($persona->codigo, 4, 7);
            $numero=$correlativo+1;
        }
        if($numero > 999999){
            $correlativo = $numero;
        } 
        if($numero > 99999){
            $correlativo = "0" . $numero;
        } 
        if($numero > 9999){
            $correlativo = "00" . $numero;
        } 
        if($numero > 999){
            $correlativo = "000" . $numero;
        }        
        if($numero > 99){
            $correlativo = "0000" . $numero;
        }       
        if($numero > 9){
            $correlativo = "00000" . $numero;
        }                            
        if ($numero>0 && $numero<10) {
            $correlativo = "000000" . $numero;
        }

        return strtoupper($incial.'-'.$correlativo);
    }
}
