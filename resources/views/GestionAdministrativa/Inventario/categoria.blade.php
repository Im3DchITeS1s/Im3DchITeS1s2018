@extends('adminlte::page')

@section('title', 'Mantenimiento - Categoria')

@section('content_header')
    <div class="content-header">
        <h1>Categoria
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Categoria</li>
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
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"></small>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Nombre</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre_add" placeholder="ingresar categoria" autofocus>
                                </div>                                             
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
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                         <label>Nombre</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <input type="text" class="form-control" id="nombre_edit" placeholder="ingresar nombre categoria" autofocus>
                                </div>   
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
        var id = 0;
        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('categoria.getdata') !!}',
                columns: [
                    { data: 'nombre', name: 'nombre' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });

         //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorNombre').addClass('hidden');
            $('#addModal').modal('show'); 

        });              

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/gestionadministrativa/inventario/categoria',
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
                            $('nombre_add').val('');
                            table.ajax.reload();
                        });                          
                    }
                },
            }); 
        });

    //Edit
    $(document).on('click', '.edit-modal-categoria', function() {                               
        $('.modal-title').text('Editar Informacion');
        $('.errorNombre').addClass('hidden');
                   
        id = $(this).data('id');                   
        $('#nombre_edit').val($(this).data('nombre'));
        $('#editModal').modal('show'); 
    }); 
     
          

          $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/gestionadministrativa/inventario/categoria/' + id,
                data: {
                    '_token':   $('input[name=_token]').val(),
                    'id':       id,
                    'nombre':   $('#nombre_edit').val(),
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
      
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
                            id = 0;
                            $('#nombre_edit').val('');
                           
                          table.ajax.reload(); 
                        });                          
                    }
                },
            }); 
        });

        // delete
        $(document).on('click', '.delete-modal-categoria', function() {
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
                    url: "/gestionadministrativa/inventario/categoria/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'fkestado': $(this).data('fkestado')
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

