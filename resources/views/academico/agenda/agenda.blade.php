@extends('adminlte::page')

@section('title', 'Mantenimiento - Agenda')

@section('content_header')
    <div class="content-header">
        <h1>Calendarización de Actividades
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Calendarización</li>
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
                <div class="col-xs-12">
                    <div class="box">
                        <br>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                                <thead >
                                    <tr>
                                        <th width="15%">Actividad</th>
                                        <th width="15%">Descripción</th>
                                        <th width="15%">Fecha Ingresada</th>
                                        <th width="15%">Fecha Programada</th>
                                        <th width="8%">Accion</th>
                                    </tr>
                                </thead>
                            </table> 
                        </div>
                    </div>
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
                        
                           
                             <!--Drop list de la Actividad-->
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Actividad</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipoactividad_add" id='fktipoactividad_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar una</small>                                                     
                                <p class="errorTipoActividad text-center alert alert-danger hidden"></p>
                            </div> 
        
                                <!--Ingresada-->
                        <div class="col-sm-6">
                                 <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Fecha Ingresada</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_ingresada_add" name="fecha_ingresada_add" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFechaIngresada text-center alert alert-danger hidden"></p>
                        </div> 


                             <!--Programada-->
                        <div class="col-sm-6">
                                 <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Fecha Programada</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_programada_add" name="fecha_programada_add" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFechaProgramada text-center alert alert-danger hidden"></p>
                        </div>    
                                      <!--Descripción-->
                        <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Descripción</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <textarea rows="4" cols="60" type="text" class="form-control" id="descripcion_add" placeholder="Descripción" autofocus maxlength="1000"></textarea>
                                </div>                                                          
                            <small class="control-label">Max: 1000| unico</small>
                            <p class="errorDescripcion text-center alert alert-danger hidden"></p>
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
                            <div class="col-sm-12">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                             <!--Descripción-->
                        <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Descripción</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <textarea rows="4" cols="60" type="text" class="form-control" id="descripcion_edit" placeholder="Descripción" autofocus maxlength="1000"></textarea>
                                </div>                                                          
                            <small class="control-label">Max: 1000| unico</small>
                            <p class="errorDescripcion text-center alert alert-danger hidden"></p>
                        </div>   
                        
                       <!--Drop list de la Actividad-->
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Actividad</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipoactividad_edit" id='fktipoactividad_edit' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar una</small>                                                     
                                <p class="errorTipoActividad text-center alert alert-danger hidden"></p>
                            </div> 

                       <!--Ingresada-->
                        <div class="col-sm-6">
                                 <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Fecha Ingresada</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_ingresada_edit" name="fecha_ingresada_edit" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFechaIngresada text-center alert alert-danger hidden"></p>
                        </div> 


                             <!--Programada-->
                        <div class="col-sm-6">
                                 <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Fecha Programada</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_programada_edit" name="fecha_programada_edit" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFechaProgramada text-center alert alert-danger hidden"></p>
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
                ajax: '{!! route('Agenda.getdata') !!}',
                columns: [
                    { data: 'actividad', name: 'Descripción' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'fecha_ingresada', name: 'fecha_ingresada' },
                    { data: 'fecha_programada', name: 'fecha_programada' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

         //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorDescripcion').addClass('hidden');
            $('.errorTipoActividad').addClass('hidden');
            $('.errorFechaIngresada').addClass('hidden');
            $('.errorFechaProgramada').addClass('hidden');
            $('#addModal').modal('show');

                   
              $.get("/academico/agenda/droptipoactividad/"+5,function(response,id){
                $("#fktipoactividad_add").empty();
                $("#fktipoactividad_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                $("#fktipoactividad_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                $('#fktipoactividad_add').val('').trigger('change.select2'); 
                }
            });      
            });              

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/academico/agenda/agenda',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'descripcion': $('#descripcion_add').val(),
                    'fktipoactividad': $('#fktipoactividad_add').val(),
                    'fecha_ingresada':    $('#fecha_ingresada_add').val(),
                    'fecha_programada':    $('#fecha_programada_add').val(),

                },
                success: function(data) {
                    $('.errorDescripcion').addClass('hidden');
                    $('.errorTipoActividad').addClass('hidden');
                    $('.errorFechaProgramada').addClass('hidden');
        

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);
                     if (data.errors.descripcion) {
                            $('.errorDescripcion').removeClass('hidden');
                            $('.errorDescripcion').text(data.errors.descripcion);
                        }

                       if (data.errors.fktipoactividad) {
                            $('.errorTipoActividad').removeClass('hidden');
                            $('.errorTipoActividad').text(data.errors.fktipoactividad);
                        }
                        if (data.errors.fecha_ingresada) {
                            $('.errorFechaIngresada').removeClass('hidden');
                            $('.errorFechaIngresada').text(data.errors.fecha_ingresada);
                        }

                        if (data.errors.fecha_programada) {
                            $('.errorFechaProgramada').removeClass('hidden');
                            $('.errorFechaProgramada').text(data.errors.fecha_programada);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#descripcion_add').val('');
                            $('#fktipoactividad_add').val('');
                            $('#fecha_ingresada_add').val('');
                            $('#fecha_programada_add').val('');
               
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
            $('.errorDescripcion').addClass('hidden');
            $('.errorTipoActividad').addClass('hidden');
            $('.errorFechaIngresada').addClass('hidden');
            $('.errorFechaProgramada').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            $('descripcion_edit').val($(this).data('descripcion'));
            fktipoactividad = $(this).data('fktipoactividad');
            $('#fecha_ingresada_edit').val($(this).data('fecha_ingresada'));
            $('#fecha_programada').val($(this).data('fecha_programada_edit'));
       
            id = $('#id_edit').val();
            
            $('#editModal').modal('show');

            
          $.get("/academico/agenda/droptipoactividad/"+5,function(response,id){
                $("#fktipoactividad_edit").empty();
                $("#fktipoactividad_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                $("#fktipoactividad_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                $('#fktipoactividad_edit').val(fktipoactividad).trigger('change.select2'); 
                }
            });          
            }); 
     
          

          $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/academico/agenda/agenda' + id,
                data: {
                    '_token':   $('input[name=_token]').val(),
                    'id':       $("#id_edit").val(),
                    'descripcion':   $('#descripcion_edit').val(),
                    'fecha_ingresada':   $('#fecha_ingresada_edit').val(),
                    'fecha_programada':      $('#fiecha_programada_edit').val(),
                    'fktipoactividad': $('#fktipoactividad_edit').val()
                },
                success: function(data) {
                    $('.errorDescripcion').addClass('hidden');
                    $('.errorFechaIngresada').addClass('hidden');
                    $('.errorFechaProgramada').addClass('hidden');
                    $('.errorTipoActividad').addClass('hidden')
               

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.descripcion) {
                            $('.errorDescripcion').removeClass('hidden');
                            $('.errorDescripcion').text(data.errors.descripcion);
                        }
                        if (data.errors.fecha_ingresada) {
                            $('.errorFechaIngresada').removeClass('hidden');
                            $('.errorFechaIngresada').text(data.errors.fecha_ingresada);
                        }
                        if (data.errors.fecha_programada) {
                            $('.errorFechaProgramada').removeClass('hidden');
                            $('.errorFechaProgramada').text(data.errors.fecha_programada);
                        }
                        if (data.errors.fktipoactividad) {
                            $('.errorTipoActividad').removeClass('hidden');
                            $('.errorTipoActividad').text(data.errors.fktipoactividad);
                        }
                      
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                            $("#id_edit").val('');
                            $('#descripcion_edit').val('');
                            $('#fecha_ingresada_edit').val('');
                            $('#fecha_programada_edit').vl('');
                            $('#fktipoactividad_edit').val('');
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
                    url: "/academico/agenda/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkagenda': id,
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