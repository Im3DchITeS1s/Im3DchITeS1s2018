<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Producto;
use App\AltaProducto;
use App\InventarioStockProducto;

class AltaProductoController extends Controller
{
     #Verificacion  del Insert
    protected $verificar_insert = 
    [
        'cantidad' => 'required|integer',
        'observacion' => 'required|max:150',
        'fkproducto' => 'required|integer',
    ];

    #Funcion de Autenticacion
     public function __construct() 			
    {
        $this->middleware('auth');
    }

    #LLamada a  la vista
     public function index()
    {   
        return view('GestionAdministrativa/Inventario/altaproducto'); //retorna la vista
    }

    #Funcion de Insercion de valores
    public function store(Request $request)  
    {
    
        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new AltaProducto();            
            $insert->cantidad = $request->cantidad;
            $insert->observacion = $request->observacion;
            $insert->fkproducto = $request->fkproducto;                                                                                    
            if($insert->save())
            {
                $verificar_existe = InventarioStockProducto::where('fkproducto', $request->fkproducto)->first();
                if(!is_null($verificar_existe))
                {
                    $update = InventarioStockProducto::findOrFail($verificar_existe->id);
                    $update->cantidad = $update->cantidad + $request->cantidad;
                    $update->save();
                    return response()->json($insert);
                }
                else
                {
                    $new = new InventarioStockProducto();
                    $new->fkproducto = $request->fkproducto;
                    $new->cantidad = $request->cantidad;
                    $new->save();  
                    return response()->json($insert);                  
                }
            }
        }        
    }

     public function getdata()
    {

        $query = AltaProducto::dataAltaProducto();

        return Datatables::of($query)->make(true);

    }

    #Funcion para actualizar 
     public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(),        
        [
            'cantidad' => 'required|max:5|integer', // el request id valida que el nombre existe y no lo vuelve escribir
            'observacion' => 'required|max:50',
            'fkproducto'=>'required:interger'

       
        ]);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = AltaProducto::findOrFail($id);              
            $cambiar->cantidad = $request->cantidad;
            $cambiar->observacion = $request->observacion; //request = nombres del formulario (derecho)  , objeto = nombre de la tabla (izquierdo)
            $cambiar->fkproducto = $request->fkproducto;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function dropProducto(Request $request, $id)
    {
        if($request->ajax()){
            $estado = AltaProducto::buscarProducto($id);
            return response()->json($estado);
        }        
    }
    
}#Fin Clase
