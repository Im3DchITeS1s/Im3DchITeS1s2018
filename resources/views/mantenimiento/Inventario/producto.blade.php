@extends('adminlte::page')

@section('title', 'Mantenimiento - Producto')

@section('content_header')
    <div class="content-header">
        <h1>Producto
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Producto</li>
        </ol>                      
    </div>    
@stop

@section('content')
    
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">INFORMACION</h3>
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
                            <th width="25%">Nombre</th>
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

    <!-- Modal Agregar -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group has-success">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Nombre</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre_add" placeholder="ingresar carrera" autofocus>
                                </div>                                                             
                                <textarea type="text" class="form-control" id="descripcion_add" placeholder="ingresar Descripcion" autofocus></textarea>
                                <small class="control-label">Max: 32</small>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>
                            </div>
                            <!--Drop list de la categoria-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                       <label>Categoria</label>
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcategoria_add" id='fkcategoria_add' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorCategoria text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
     
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add" data-dismiss="modal">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <!-- Modal Editar -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <input type="text" class="form-control" id="nombre_edit" placeholder="ingresar carrera" autofocus>
                                </div> 
                                <textarea type="text" class="form-control" id="descripcion_edit" placeholder="ingresar Descripcion" autofocus></textarea>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>    
                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                name="fkestado_edit" id='fkestado_edit' required autofocus>
                                </select> 
                                <p class="errorEstado text-center alert alert-danger hidden"></p>               
                            </div>
                        </div>                        
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>      

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        var table = "";
        //dropdownlist
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('producto.getdata') !!}',
                columns: [
                    { data: 'producto', name: 'producto' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'categoria', name: 'categoria_add' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });

         //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorNombre').addClass('hidden');
            $('.errorDescipcion').addClass('hidden');
            $('.errorCategoria').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/gestionadministrativa/inventario/producto"+5,function(response,id){
                $("#fkcategoria_add").empty();
                $("#fkcategoria_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcategoria_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcategoria_add').val('').trigger('change.select2'); 
                }
            });              

            });              

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/gestionadministrativa/inventario/producto/',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fknombre': $('#fknombre_add').val(),
                    'descripcion': $('#descripcion_add').val(),
                    'fkcategoria': $('#fkcategoria_add').val(),
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
                    $('.errorDescipcion').addClass('hidden');
                    $('.errorCategoria').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);
                     if (data.errors.nombre) {
                            $('.errorNombre').removeClass('hidden');
                            $('.errorNombre').text(data.errors.nombre);
                        }

                    if (data.errors.descripcion) {
                        $('.errorDescipcion').removeClass('hidden');
                        $('.errorDescipcion').text(data.errors.descripcion);
                    }

                      if (data.errors.fkcategoria) {
                            $('.errorCategoria').removeClass('hidden');
                            $('.errorCategoria').text(data.errors.fkcategoria);
                        }
                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('nombre_add').val('');
                            $('#descripcion_add').val('');
                            $('#fkcategoria_add').val('');
                            table.ajax.reload();
                        });                          
                    }
                },
            }); 
        });


        // delete
        $(document).on('click', '.delete-modal', function() {
            id = $(this).data('id');
            swal({
              title: "Esta seguro?",
              text: "modificara el estado de la informacion",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: "/mantenimiento/profesion/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkprofesion': id,
                        'estado' : $(this).data('estado')
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          table.ajax.reload(); 
                        });                                                    
                    },
                });                                          
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });
    </script>
@stop

