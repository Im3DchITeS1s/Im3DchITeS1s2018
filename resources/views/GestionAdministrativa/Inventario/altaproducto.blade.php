@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CARGAR CONTENIDO CATEDRATICO')

@section('content_header')
    <div class="content-header">
        <h1>CARGAR INVENTARIO</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Inventario</a></li>
            <li><a href="#">Carga Producto</a></li>
        </ol>                      
    </div>    
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cargar Inventario</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="box-body form-group has-success">
                      <div class="row">                  
                        <!--Drop list de la Producto-->
                            <div class="col-sm-10">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkproducto_add" id='fkproducto_add' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorCategoria text-center alert alert-danger hidden"></p>
                            </div>
                       
                            <div class="col-sm-2">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="number" class="form-control" id="titulo_add" placeholder="Cantidad" required autofocus>
                                </div>
                                <small class="control-label">required|max:100</small>
                                <p class="errorTitutloAdd text-center alert alert-danger hidden"></p>                  
                            </div>                    
                        <div class="col-sm-12">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                              </div>
                              <textarea type="text" class="form-control" id="descripcion_add" placeholder="Observaciones" required autofocus></textarea>
                            </div>
                            <small class="control-label">required|max:1000</small>
                            <p class="errorDescripcionAdd text-center alert alert-danger hidden"></p>                  
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>
                </div>             
            </div>
        </div>
    <script type="text/javascript">

         //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('producto.getdata') !!}',
                columns: [
                    { data: 'producto', name: 'producto' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'categoria', name: 'categoria_add' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });

         //dropdownlist
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        //Carga del droplist

       $.get("/gestionadministrativa/inventario/altaproducto/dropproducto/"+5,function(response,id){
                $("#fkproducto_add").empty();
                $("#fkproducto_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkproducto_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkproducto_add').val('').trigger('change.select2'); 
                }
        });  

    </script>


    
@stop