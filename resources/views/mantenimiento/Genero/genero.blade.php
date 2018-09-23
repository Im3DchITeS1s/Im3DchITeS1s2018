@extends('adminlte::page')

@section('title', 'Mantenimiento - Genero')

@section('content_header')
	<div class="content-header">
        <h1>Género
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Género</li>
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
                            <div class="col-sm-11">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Género</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre_add" placeholder="Ingresar Género" autofocus>
                                </div>                                                               
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
                                        <label>Género</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <input type="text" class="form-control" id="nombre_edit" placeholder="Edite el genero" autofocus>                         
                                </div> 
                                <p class="errorNombre text-center alert alert-danger hidden"></p>    
                            </div>
                        </div>
                        <div class="form-group has-warning">
                           
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
                ajax: '{!! route('genero.getdata') !!}',
                columns: [
                    { data: 'nombre', name: 'nombre' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        // Insert
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorNombre').addClass('hidden');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/genero',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nombre': $('#nombre_add').val(),
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
                    } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#nombre_add').val('');
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
                                
            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
                   
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/genero/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'nombre': $('#nombre_edit').val(),
                    'fkestado': $('#fkestado_edit').val()
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
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
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                        .then((value) => {
                            $("#id_edit").val('');
                            $('#nombre_edit').val('');
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
                    url: "/mantenimiento/genero/cambiarEstado",
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