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
                                <p class="errorSeleccionarProducto text-center alert alert-danger hidden"></p>
                            </div>
                       
                            <div class="col-sm-2">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="number" class="form-control" id="cantidad_add" placeholder="Cantidad" required autofocus>
                                </div>
                                <p class="errorCantidad text-center alert alert-danger hidden"></p>                  
                            </div>                    
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <textarea type="text" class="form-control" id="observacion_add" placeholder="Observaciones" required autofocus></textarea>
                                </div>
                                <p class="errorObservacion text-center alert alert-danger hidden"></p>                  
                            </div>
                        </div>
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
    </div>
     <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">MOVIMIENTOS</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                    <thead >
                        <tr>
                            <th width="25%">Producto</th>
                            <th width="25%">Descripcion</th>
                            <th width="25%">Categoria</th>
                            <th width="8%">Accion</th>
                        </tr>
                    </thead>
                </table>         
            </div>                
          </div>
        </div>

        <div class="box-footer">

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

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/gestionadministrativa/inventario/altaproducto',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkproducto': $('#fkproducto_add').val(),
                    'cantidad': $('#cantidad_add').val(),
                    'observacion': $('#observacion_add').val(),
                },
                success: function(data) {
                    $('.errorSeleccionarProducto').addClass('hidden');
                    $('.errorCantidad').addClass('hidden');
                    $('.errorObservacion').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                     if (data.errors.fkproducto) {
                            $('.errorSeleccionarProducto').removeClass('hidden');
                            $('.errorSeleccionarProducto').text(data.errors.fkproducto);
                        }

                     if (data.errors.cantidad) {
                            $('.errorCantidad').removeClass('hidden');
                            $('.errorCantidad').text(data.errors.cantidad);
                        }

                    if (data.errors.observacion) {
                            $('.errorObservacion').removeClass('hidden');
                            $('.errorObservacion').text(data.errors.observacion);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                           $.get("/gestionadministrativa/inventario/altaproducto/dropproducto/"+5,function(response,id){
                                    $("#fkproducto_add").empty();
                                    $("#fkproducto_add").append("<option value=''> seleccionar </option>");
                                    for(i=0; i<response.length; i++){
                                        $("#fkproducto_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                                        $('#fkproducto_add').val('').trigger('change.select2'); 
                                    }
                            });
                            $('#cantidad_add').val('');
                            $('#observacion_add').val('');
                        });                          
                    }
                },
            }); 
        });       

    </script>

@stop