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
                             <th width="25%">Alumno</th>
                             <th width="25%">Carrera Grado Sección</th>
                             <th width="25%">Periodo Académico</th>
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
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera, Grado y Sección</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcantidad_alumno_add" id='fkcantidad_alumno_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorCantidadAlumno text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Alumno-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Estudiante</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpersona_add" id='fkpersona_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorPersona text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Período Académico-->
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Período Académico</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_periodo_add" id='fktipo_periodo_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorPeriodo text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Campo de pago-->
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                   <label>Pago Q</label>
                                  </div>
                                  <input type="text" class="form-control" id="pago_add" placeholder="Pago" autofocus maxlength="4">
                                </div>                                                               
                                <small class="control-label">Max: 4| </small>
                                <p class="errorPago text-center alert alert-danger hidden"></p>
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
                         
                         <!--Carrera Grado Sección-->
                        <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera, Grado y Sección</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcantidad_alumno_edit" id='fkcantidad_alumno_edit' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorCantidadAlumno text-center alert alert-danger hidden"></p>
                            </div> 

                    <!--Drop list de la Alumno-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Estudiante</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpersona_edit" id='fkpersona_edit' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorPersona text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Período Académico-->
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Período Académico</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_periodo_edit" id='fktipo_periodo_edit' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorPeriodo text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Campo de pago-->
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                   <label>Pago Q</label>
                                  </div>
                                  <input type="text" class="form-control" id="pago_edit" placeholder="Pago" autofocus maxlength="4">
                                </div>                                                               
                                <small class="control-label">Max: 4| </small>
                                <p class="errorPago text-center alert alert-danger hidden"></p>
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
                    { data: 'alumno', name: 'alumno' },
                    { data: 'gradocarreraseccion', name: 'gradocarreraseccion' },
                    { data: 'tipo_periodo', name: 'tipo_periodo' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


        //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorCantidadAlumno').addClass('hidden');
            $('.errorPeriodo').addClass('hidden');
            $('.errorPersona').addClass('hidden');
            $('.errorPago').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/academico/inscripcion/dropCantidadCarreraGrado/"+5,function(response, id){
                $("#fkcantidad_alumno_add").empty();
                $("#fkcantidad_alumno_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcantidad_alumno_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].grado+" / "+response[i].letra+" </option>");
                    $('#fkcantidad_alumno_add').val('').trigger('change.select2'); 
                }
            });

             $.get("/mantenimiento/periodoacademico/droptiperiodo/"+5,function(response,id){
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
                url: '/academico/inscripcion/inscripcion',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcantidad_alumno': $('#fkcantidad_alumno_add').val(),
                    'fktipo_periodo': $('#fktipo_periodo_add').val(),
                    'fkpersona': $('#fkpersona_add').val(),
                    'pago': $('#pago_add').val(),


                },
                success: function(data) {
                    $('.errorCantidadAlumno').addClass('hidden');
                    $('.errorTipoPeriodo').addClass('hidden');
                    $('.errorPersona').addClass('hidden');
                    $('.errorPago').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                     if (data.errors.fkcantidad_alumno) {
                            $('.errorCantidadAlumno').removeClass('hidden');
                            $('.errorCantidadAlumno').text(data.errors.fkcantidad_alumno);
                        }

                     if (data.errors.fktipo_periodo) {
                            $('.errorPeriodo').removeClass('hidden');
                            $('.errorPeriodo').text(data.errors.fktipo_periodo);
                        }

                    if (data.errors.fkpersona) {
                            $('.errorPersona').removeClass('hidden');
                            $('.errorPersona').text(data.errors.fkpersona);
                        }

                    if (data.errors.pago) {
                            $('.errorPersona').removeClass('hidden');
                            $('.errorPersona').text(data.errors.pago);
                        }
                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkcarrera_grado').val('');
                            $('#fktipo_periodo').val('');
                            $('#fkpersona').val('');
                            $('#pago').val('');
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
            $('.errorCantidadAlumno').addClass('hidden');
            $('.errorPeriodo').addClass('hidden');
            $('.errorPersona').addClass('hidden');
            $('.errorPago').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            $('#pago_edit').val($(this).data('pago'));
            id = $('#id_edit').val();
            fkcantidad_alumno = $(this).data('fkcantidad_alumno');
            fktipo_periodo = $(this).data('fktipo_periodo');
            fkpersona = $(this).data('fkpersona');
            $('#editModal').modal('show');

            $.get("/academico/inscripcion/dropCantidadCarreraGrado/"+5,function(response, id){
                $("#fkcantidad_alumno_edit").empty();
                $("#fkcantidad_alumno_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcantidad_alumno_edit").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].grado+" / "+response[i].letra+" </option>");
                    $('#fkcantidad_alumno_edit').val(fkcantidad_alumno).trigger('change.select2'); 
                }
            });

             $.get("/mantenimiento/periodoacademico/droptiperiodo/"+5,function(response,id){
                $("#fktipo_periodo_edit").empty();
                $("#fktipo_periodo_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                $("#fktipo_periodo_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                $('#fktipo_periodo_edit').val(fktipo_periodo).trigger('change.select2'); 
                }
            });     

             $.get("/academico/inscripcion/dropestudiante/"+7,function(response,id){
                $("#fkpersona_edit").empty();
                $("#fkpersona_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpersona_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkpersona_edit').val(fkpersona).trigger('change.select2'); 
                }
            });      
     });

          $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/academico/inscripcion/inscripcion/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'fkcantidad_alumno': $('#fkcantidad_alumno_edit').val(),
                    'fktipo_periodo': $('#fktipo_periodo_edit').val(),
                    'fkpersona': $('#fkpersona_edit').val(),
                    'pago': $('#pago_edit').val()
                },
                success: function(data) {
                    $('.errorCantidadAlumno').addClass('hidden');
                    $('.errorPeriodo').addClass('hidden');
                    $('.errorPersona').addClass('hidden');
                    $('.errorPago').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                    if (data.errors.fkcantidad_alumno) {
                            $('.errorCantidadAlumno').removeClass('hidden');
                            $('.errorCantidadAlumno').text(data.errors.fkcantidad_alumno);
                        }

                     if (data.errors.fktipo_periodo) {
                            $('.errorPeriodo').removeClass('hidden');
                            $('.errorPeriodo').text(data.errors.fktipo_periodo);
                        }

                    if (data.errors.fkpersona) {
                            $('.errorPersona').removeClass('hidden');
                            $('.errorPersona').text(data.errors.fkpersona);
                        }

                    if (data.errors.pago) {
                            $('.errorPago').removeClass('hidden');
                            $('.errorPago').text(data.errors.pago);
                        }
                     } else {
                        swal("Correcto", "Se modificó la informacion", "success")
                        .then((value) => {
                            $('#fkcarrera_grado_edit').val('');
                            $('#fktipo_periodo_edit').val('');
                            $('#fkpersona_edit').val('');
                            $('#pago_edit').val('');
                            table.ajax.reload();
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
                    url: "/academico/inscripcion/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'accion' : $(this).data('accion')
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