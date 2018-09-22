<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Categoria;
use App\Estado;
use App\Producto;

class ProductoController extends Controller
{
     protected $verificar_insert =
    [
        'nombre' => 'required|max:50|unique:producto',
    ];

    protected $verificar_update =
    [
        'nombre' => 'required|max:32|unique:producto,nombre,$id',
        'fkestado' => 'required'
    ];    


	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        return view('GestionAdministrativa/Inventario/producto');
    }
 	 public function getdata()
    {

        $query = Producto::dataProducto();
        return Datatables::of($query)
            ->addColumn('action', function ($data) {

                $btn_estado = '<button class="delete-modal-profesion btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="edit-modal-profesion btn btn-warning btn-xs" type="button" data-fkpersona_profesion="'.$data->id.'" data-idproducto="'.$data->producto.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

   public function dropproducto(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Producto::buscarProducto($id);
            return response()->json($estado);
        }        
    }

        // Funcion Cambiar Estado
    public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = Productofunc::findOrFail($request->fkproducto); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    
}//FinClaas
