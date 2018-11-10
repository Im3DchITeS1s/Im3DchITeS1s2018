@extends('adminlte::page')

@section('title', 'Mantenimiento - CatedraticoCurso')

@section('content_header')
    <div class="content-header">
        <h1>Catedrático Curso
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Catedrático Curso</li>
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
                            <th width="25%">Catedrático</th>
                            <th width="25%">Carrera Grado Cursos</th>
                            <th width="25%">Fecha (Inicio-Fin)</th>
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
                          <!--Inicio-->
                        <div class="col-sm-5">
                                <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Inicio</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_inicio_add" name="fecha_inicio_add" placeholder="dd/mm/yyyy" autofocus>
                                </div>                                                               
                                    <p class="errorInicio text-center alert alert-danger hidden"></p>
                        </div>
                             <!--Fin-->
                        <div class="col-sm-5">
                                 <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Fin</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_fin_add" name="fecha_fin_add" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFin text-center alert alert-danger hidden"></p>
                        </div>  
                         <!--Campo de Periodos-->
                            <div class="col-sm-6">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                   <label>No. Períodos</label>
                                  </div>
                                  <input type="text" class="form-control" id="cantidad_periodo_add" name ="cantidad_periodo_add" placeholder="Cantidad de Periodos" autofocus maxlength="6">
                                </div>                                                               
                                <small class="control-label"> </small>
                                <p class="errorCantidad text-center alert alert-danger hidden"></p>
                            </div>  

                             <!--Drop list de la Catedratico-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Catedratico</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpersona_add" id='fkpersona_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorPersona text-center alert alert-danger hidden"></p>
                            </div> 


                             <!--Drop list de la Carrera Grado-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carreras Grados</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcantidad_alumno_add" id='fkcantidad_alumno_add' onChange="llenardrop(this);" required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                       
                                <p class="errorCantidadAlumno text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Carrera Grado-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carrera Curso</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_curso_add" id='fkcarrera_curso_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorCarreraCurso text-center alert alert-danger hidden"></p>
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
                ajax: '{!! route('CatedraticoCurso.getdata') !!}',
                columns: [
                    { data: 'catedratico', name: 'catedratico' },
                    { data: 'datos_carreras', name: 'datos_carreras' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


        //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorInicio').addClass('hidden');
            $('.errorFin').addClass('hidden');
            $('.errorCantidad').addClass('hidden');
            $('.errorPersona').addClass('hidden');
            $('.errorCantidadAlumno').addClass('hidden');
            $('.errorCarreraCurso').addClass('hidden');
            $('#addModal').modal('show');

             $.get("/academico/catedraticocurso/dropdocente/"+5,function(response,id){
                $("#fkpersona_add").empty();
                $("#fkpersona_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpersona_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkpersona_add').val('').trigger('change.select2'); 
                }
            });   

          $.get("/academico/inscripcion/dropCantidadCarreraGrado/"+5,function(response, id){
                $("#fkcantidad_alumno_add").empty();
                $("#fkcantidad_alumno_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcantidad_alumno_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+" | "+ response[i].grado+"</option>");
                    $('#fkcantidad_alumno_add').val('').trigger('change.select2'); 
                }
            });

       });       
        

    function llenardrop(id) {

         $.get("/academico/catedraticocurso/dropcarreracurso/"+id.value,function(response, id){
                $("#fkcarrera_curso_add").empty();
                $("#fkcarrera_curso_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_curso_add").append("<option value='"+response[i].id+"'> "+response[i].curso+"</option>");
                    $('#fkcarrera_curso_add').val('').trigger('change.select2'); 
                }
            });

    }


        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/academico/catedraticocurso/catedraticocurso',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fecha_inicio': $('#fecha_inicio_add').val(),
                    'fecha_fin': $('#fecha_fin_add').val(),
                    'cantidad_periodo': $('#cantidad_periodo_add').val(),
                    'fkpersona': $('#fkpersona_add').val(),
                    'fkcantidad_alumno': $('#fkcantidad_alumno_add').val(),
                    'fkcarrera_curso': $('#fkcarrera_curso_add').val(),
                },
                success: function(data) {
                    $('.errorInicio').addClass('hidden');
                    $('errorFin').addClass('hidden');
                    $('errorCantidad').addClass('hidden');
                    $('.errorPersona').addClass('hidden');
                    $('.errorCantidadAlumno').addClass('hidden');
                    $('.errorCarreraCurso').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                     if (data.errors.fecha_inicio) {
                            $('.errorInicio').removeClass('hidden');
                            $('.errorInicio').text(data.errors.fecha_inicio);
                        }

                     if (data.errors.fecha_fin) {
                            $('.errorFin').removeClass('hidden');
                            $('.errorFin').text(data.errors.fecha_fin);
                        }

                    if (data.errors.cantidad_periodo) {
                            $('.errorCantidad').removeClass('hidden');
                            $('.errorCantidad').text(data.errors.cantidad_periodo);
                        }

                     if (data.errors.fkpersona) {
                            $('.errorPersona').removeClass('hidden');
                            $('.errorPersona').text(data.errors.fkpersona);
                        }

                    if (data.errors.fkcantidad_alumno) {
                            $('.errorCantidadAlumno').removeClass('hidden');
                            $('.errorCantidadAlumno').text(data.errors.fkcantidad_alumno);
                        }

                    if (data.errors.fkcarrera_curso) {
                            $('.errorCarreraCurso').removeClass('hidden');
                            $('.errorCarreraCurso').text(data.errors.fkcarrera_curso);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#inicio_add').val('');
                            $('#fin_add').val('');
                            $('cantidad_periodo_add').val('');
                            $('#fkpersona_add').val('');
                            $('#fkcantidad_alumno_add').val('');
                             $('#fkcarrea_curso_add').val('');
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
                    url: "/academico/catedraticocurso/catedraticocurso/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkcatedraticocurso': id,
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