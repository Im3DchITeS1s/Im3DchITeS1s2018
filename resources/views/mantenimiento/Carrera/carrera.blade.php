@extends('adminlte::page')

@section('title', 'Mantenimiento - Carrera')

@section('content_header')
    <div class="content-header">
        <h1>Carrera
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Carrera</li>
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
                                    <label>Carrera</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre_add" placeholder="Ingresar carrera" autofocus>
                                </div>                               
                                <textarea type="text" class="form-control" id="descripcion_add" placeholder="Ingresar Descripcion" autofocus></textarea>
                                <small class="control-label">Max: 32</small>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>
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
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <input type="text" class="form-control" id="nombre_edit" placeholder="Editar la informacion" autofocus>
                                </div> 
                                <textarea type="text" class="form-control" id="descripcion_edit" placeholder="Editar la Descripcion" autofocus></textarea>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>    
                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
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
                ajax: '{!! route('Carrera.getdata') !!}',
                columns: [
                    { data: 'nombre', name: 'nombre' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        // Insert
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorNombre').addClass('hidden');
            $('.errorDescripcion').addClass('hidden');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/carrera',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nombre': $('#nombre_add').val(),
                    'descripcion': $('#descripcion_add').val(),
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');

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
                            $('.errorDescripcion').removeClass('hidden');
                            $('.errorDescripcion').text(data.errors.descripcion);
                        }
                    } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#nombre_add').val('');
                            $('#descripcion_add').val('');
                          table.ajax.reload(); 
                        }); 
                    }
                },
            });  
        });


        //Edit
        $(document).on('click', '.edit-modal', function() {    
            $('#id_edit').addClass('hidden');                               
            $('.modal-title').text('Editar Informacion');
            $('.errorNombre').addClass('hidden');
            $('.errorDescripcion').addClass('hidden');
            $('.errorEstado').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            $('#descripcion_edit').val($(this).data('descripcion'));
            id = $('#id_edit').val();
            id_estado = $(this).data('fkestado');
            $('#editModal').modal('show');
            $.get("/mantenimiento/carrera/dropestado/"+1,function(response,id){
                $("#fkestado_edit").empty();
                for(i=0; i<response.length; i++){
                    $("#fkestado_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkestado_edit').val(id_estado).trigger('change.select2'); 
                }
            });           
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/carrera/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'nombre': $('#nombre_edit').val(),
                    'descripcion': $('#descripcion_edit').val(),
                    'fkestado': $('#fkestado_edit').val()
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
                    $('.errorDescripcion').addClass('hidden');
                    $('.errorEstado').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.nombre) {
                            $('.errorNombre').removeClass('hidden');
                            $('.errorNombre').text(data.errors.nombre);
                        }
                         if (data.errors.descripcion) {
                            $('.errorDescripcion').removeClass('hidden');
                            $('.errorDescripcion').text(data.errors.descripcion);
                        }
                        if (data.errors.fkestado) {
                            $('.errorEstado').removeClass('hidden');
                            $('.errorEstado').text(data.errors.fkestado);
                        }
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                        .then((value) => {
                         $("#id_edit").val('');
                         $('#nombre_edit').val('');
                         $('#descripcion_edit').val('');
                         $('#fkestado_edit').val('');
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
                    url: "/mantenimiento/carrera/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkcarrera': id,
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