@extends('adminlte::page')

@section('title', 'Mantenimiento - CantidadAlumno')

@section('content_header')
    <div class="content-header">
        <h1>Cantidad Alumno
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Cantidad Alumno</li>
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
                            <th width="15%">Cantidad Alumno</th>
                             <th width="25%">Carrera Grado</th>
                            <th width="8%">Accion</th>
                        </tr>
                    </thead>
                </table>         
            </div>                
          </div>
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
                            <!--Cantidad-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Cantidad</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="cantidad_add" placeholder="Cantidad" autofocus maxlength="6">
                                </div>                                                          
                                <p class="errorCantidad text-center alert alert-danger hidden"></p>
                            </div>   
                        </div>      

                            <!--Drop list de la Carrera Grado-->
                        <div class="form-group has-success">
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera Grado</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_grado_add" id='fkcarrera_grado_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorCarreraGrado text-center alert alert-danger hidden"></p>
                            </div> 
                        </div> 
                        
                        <div class="form-group has-success">                       
                          <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Seccion</label>
                                        <i class="fa fa-sticky-note"></i>
                                    <small class="pull-right" style="color:green;"></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkseccion_add" id='fkseccion_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorSeccion text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                    </form>
                </div>
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
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Cantidad</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>

                                    <input type="text" class="form-control" id="cantidad_edit" placeholder="editar cantidad" autofocus>
                                </div>     
                            </div>
                        </div>
                        <!--Drop actualizar carreragrado-->
                        <div class="form-group has-warning">
                            <div class="col-sm-11">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera Grado</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_grado_edit" id='fkcarrera_grado_edit' required autofocus>
                                    </select> 
                                </div>     
                            </div>
                        </div>

                         <!--Drop actualizar carreragrado-->
                        <div class="form-group has-warning">
                            <div class="col-sm-11">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Seccion</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkseccion_edit" id='fkseccion_edit' required autofocus>
                                    </select> 
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
        var table = "";

        //dropdownlist
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
       

        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({  
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('cantidadalumno.getdata') !!}',
                columns: [
                    { data: 'cantidad', name: 'cantidad' },
                    { data: 'grado_carrera_seccion', name: 'grado_carrera_seccion' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


        //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorCantidad').addClass('hidden');
            $('.errorCarreraGrado').addClass('hidden');
            $('.errorSeccion').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/mantenimiento/cantidadalumno/dropCantidadCarreraGrado/"+5,function(response,id){
                $("#fkcarrera_grado_add").empty();
                $("#fkcarrera_grado_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_grado_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+"/"+response[i].grado+" </option>");
                    $('#fkcarrera_grado_add').val('').trigger('change.select2'); 
                }
            });              

            $.get("/mantenimiento/cantidadalumno/dropCantidadSeccion/"+5,function(response,id){
                $("#fkseccion_add").empty();
                $("#fkseccion_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkseccion_add").append("<option value='"+response[i].id+"'> "+response[i].letra+" </option>");
                    $('#fkseccion_add').val('').trigger('change.select2'); 
                }
            });            
        });        

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/cantidadalumno',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'cantidad': $('#cantidad_add').val(),
                    'fkcarrera_grado': $('#fkcarrera_grado_add').val(),
                    'fkseccion': $('#fkseccion_add').val(),
                },
                success: function(data) {
                    $('.errorCantidad').addClass('hidden');
                    $('.errorCarreraGrado').addClass('hidden');
                    $('.errorSeccion').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                     if (data.errors.cantidad) {
                            $('.errorCantidad').removeClass('hidden');
                            $('.errorCantidad').text(data.errors.cantidad);
                        }

                     if (data.errors.fkcarrera_grado) {
                            $('.errorCarreraGrado').removeClass('hidden');
                            $('.errorCarreraGrado').text(data.errors.fkcarrera_grado);
                        }

                    if (data.errors.fkseccion) {
                            $('.errorSeccion').removeClass('hidden');
                            $('.errorSeccion').text(data.errors.fkseccion);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#cantidad_add').val('');
                            $('#fkcarrera_grado_add').val('');
                            $('#fkseccion_add').val('');
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
            $('.errorCantidad').addClass('hidden');
            $('.errorCarreraGrado').addClass('hidden');
            $('.errorSeccion').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            id = $('#id_edit').val();
            fkcarrera_grado = $(this).data('fkcarrera_grado');
            fkseccion = $(this).data('fkseccion');
            $('#editModal').modal('show');

            
            $.get("/mantenimiento/cantidadalumno/dropCantidadCarreraGrado/"+5,function(response,id){
                $("#fkcarrera_grado_edit").empty();
                $("#fkcarrera_grado_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_grado_edit").append("<option value='"+response[i].id+"'> "+response[i].carrera+"/"+response[i].grado+" </option>");
                    $('#fkcarrera_grado_edit').val(fkcarrera_grado).trigger('change.select2'); 
                }
            });

            $.get("/mantenimiento/cantidadalumno/dropCantidadSeccion/"+5,function(response,id){
                $("#fkseccion_edit").empty();
                $("#fkseccion_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkseccion_edit").append("<option value='"+response[i].id+"'> "+response[i].letra+" </option>");
                    $('#fkseccion_edit').val(fkseccion).trigger('change.select2'); 
                }
            });               
        }); 
    
          

        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/cantidadalumno/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'cantidad': $('#cantidad_edit').val(),
                    'fkcarrera_grado': $('#fkcarrera_grado_edit').val(),
                    'fkseccion': $('#fkseccion_edit').val()
                },
                success: function(data) {
                    $('.errorCantidad').addClass('hidden');
                    $('.errorCarreraGrado').addClass('hidden');
                    $('.errorSeccion').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.cantidad) {
                            $('.errorCantidad').removeClass('hidden');
                            $('.errorCantidad').text(data.errors.cantidad);
                        }
                        if (data.errors.fkcarrera_grado) {
                            $('.errorCarreraGrado').removeClass('hidden');
                            $('.errorCarreraGrado').text(data.errors.fkcarrera_grado);
                        }
                        if (data.errors.fkseccion) {
                            $('.errorSeccion').removeClass('hidden');
                            $('.errorSeccion').text(data.errors.fkseccion);
                        }
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                            $("#id_edit").val('');
                            $('#cantidad_edit').val('');
                            $('#fkcarrera_grado_edit').val('');
                            $('#fkseccion_edit').val('');
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
                    url: "/mantenimiento/cantidadalumno/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkcantidadalumno': id,
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