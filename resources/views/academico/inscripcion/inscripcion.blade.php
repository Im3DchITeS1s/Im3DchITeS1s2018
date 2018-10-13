@extends('adminlte::page')

@section('title', 'Mantenimiento - Inscripción')

@section('content_header')
    <div class="content-header">
        <h1>Inscripción
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Inscripción</li>
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
                             <th width="25%">Carrera Grado</th>
                             <th width="25%">Tipo Perido</th>
                             <th width="25%">Alumno</th>
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
                      
                           
                             <!--Drop list de la Carrera Grado-->
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera Grado</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcantidad_alumno_add" id='fkcantidad_alumno_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorCantidadAlumno text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Tipo Período-->
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Tipo Período</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_periodo_add" id='fktipo_periodo_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorTipoPeriodo text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Alumno-->
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Alumno</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpersona_add" id='fkpersona_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorPersona text-center alert alert-danger hidden"></p>
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
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Nombre</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>

                                    <input type="text" class="form-control" id="nombre_edit" placeholder="editar nombre" autofocus>
                                </div>     
                            </div>
                        
                        <!--Drop actualizar carreragrado-->
                        
                            <div class="col-sm-6">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Tipo Período</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_periodo_edit" id='fktipo_periodo_edit' required autofocus>
                                    </select> 
                                </div>     
                            </div>
                    

                    <!--Inicio-->
                        <div class="col-sm-6">
                                <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Inicio</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="inicio_edit" name="inicio_edit" placeholder="dd/mm/yyyy" autofocus>
                                </div>                                                               
                                    <p class="errorInicio text-center alert alert-danger hidden"></p>
                        </div>

                             <!--Fin-->
                        <div class="col-sm-6">
                                 <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Fin</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fin_edit" name="fin_edit" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFin text-center alert alert-danger hidden"></p>
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
                ajax: '{!! route('inscripcion.getdata') !!}',
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
            $('.errorCantidadAlumno').addClass('hidden');
            $('.errorTipoPeriodo').addClass('hidden');
            $('.errorPersona').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/academico/inscripcion/dropCantidadCarreraGrado/"+5,function(response,id){
                $("#fkcarrera_grado_add").empty();
                $("#fkcarrera_grado_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_grado_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+"/"+response[i].grado+" </option>");
                    $('#fkcarrera_grado_add').val('').trigger('change.select2'); 
                }
            });              


            $.get("/academico/inscripcion/dropTipoperiodo/"+5,function(response,id){
                $("#fktipo_periodo_add").empty();
                $("#fktipo_periodo_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fktipo_periodo_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fktipo_periodo_add').val('').trigger('change.select2'); 
                }
            });    

             $.get("/academico/inscripcion/dropestudiante/"+7,function(response,id){
                $("#fkpersona_add").empty();
                $("#fkpersona_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpersona_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkpersona_add').val('').trigger('change.select2'); 
                }
            });      

        });        

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/academico/inscripcion',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcarrera_grado': $('#fkcarrera_grado_add').val(),
                    'fktipo_periodo': $('#fktipo_periodo_add').val(),
                    'fkpersona': $('#fkpersona_add').val(),
                },
                success: function(data) {
                    $('.errorCantidadAlumno').addClass('hidden');
                    $('.errorTipoPeriodo').addClass('hidden');
                    $('.errorPersona').addClass('hidden');

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
                            $('#cantidad').val('');
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
            $('#cantidad_edit').val($(this).data('cantidad'));
            $('#fkcarrera_grado_edit').val($(this).data('fkcarrera_grado'));
            $('#fkseccion_edit').val($(this).data('fkseccion'));
            id = $('#id_edit').val();
            fkcarrera_grado = $(this).data('fkcarrera_grado');
            fkseccion = $(this).data('fkseccion');
            $('#editModal').modal('show');

            
            $.get("/mantenimiento/cantidadalumno/dropCantidadCarreraGrado/"+5,function(response,id){
                $("#fkcarrera_grado_edit").empty();
                $("#fkcarrera_grado_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_grado_edit").append("<option value='"+response[i].id+"'> "+response[i].carrera+"/"+response[i].grado+" </option>");
                    $('#fkcarrera_grado_edit').val('').trigger('change.select2'); 
                }
                  });
            }); 


            $.get("/mantenimiento/cantidadalumno/dropCantidadSeccion/"+5,function(response,id){
                $("#fkseccion_edit").empty();
                $("#fkseccion_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkseccion_edit").append("<option value='"+response[i].id+"'> "+response[i].letra+" </option>");
                    $('#fkseccion_edit').val('').trigger('change.select2'); 
                }
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