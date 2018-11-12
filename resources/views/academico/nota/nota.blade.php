@extends('adminlte::page')

@section('title', 'Mantenimiento - Notas')

@section('content_header')
    <div class="content-header">
        <h1>Ingreso de Notas
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Ingreso de Notas</li>
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
                            <th width="25%">Carrera Grado</th>
                            <th width="25%">Bimestre</th>
                            <th width="25%">Curso</th>
                            <th width="25%">Puento</th>
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

                            <!--Drop list de la Cantidad de Alumno-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Carreras Grados</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcantidad_alumno_add" id='fkcantidad_alumno_add' onChange="llenardrop(this); " required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                       
                                <p class="errorCantidadAlumno text-center alert alert-danger hidden"></p>
                            </div> 

                             <!--Drop list de la Alumno-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Alumno</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkinscripcion_add" id='fkinscripcion_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorInscripcion text-center alert alert-danger hidden"></p>
                            </div> 

                            <!--Drop list de la Carrera Curso-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Curso</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_curso_add" id='fkcarrera_curso_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorCarreraCurso text-center alert alert-danger hidden"></p>
                            </div> 

                               <!--Drop list de la Tipo Período-->
                                  <div class="col-sm-6">
                            <div class="input-group">
                          <div class="input-group-addon">
                            <label>Periodo Academico</label>
                            <i class="fa fa-note"></i>
                          </div>
                            <select class="form-control js-example-basic-single" name="state" style="width: 100% name="fkperiodo_academico_add" id='fkperiodo_academico_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorPeriodoAcademico text-center alert alert-danger hidden"></p>                  
                    </div>
                            <!--Nota-->
                            <div class="col-sm-6">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Nota</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nota_add" placeholder="Ingresar Nota" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 32</small>
                                <p class="errorNota text-center alert alert-danger hidden"></p>
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
                paginate:   true,
                searching:  true,
                ajax: '{!! route('Nota.getdata') !!}',
                columns: [
                    { data: 'alumno', name: 'alumno' },
                    { data: 'datos_carreras', name: 'datos_carreras' },
                    { data: 'periodo_academico', name: 'periodo_academico' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            }); 
        });

        //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorInscripcion').addClass('hidden');
            $('.errorCantidadAlumno').addClass('hidden');
            $('.errorPeriodoAcademico').addClass('hidden');
            $('.errorCarreraCurso').addClass('hidden');
            $('.errorNota').addClass('hidden');
            $('#addModal').modal('show');
  
          $.get("/academico/inscripcion/dropCantidadCarreraGrado/"+5,function(response, id){
                $("#fkcantidad_alumno_add").empty();
                $("#fkcantidad_alumno_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcantidad_alumno_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+"  "+ response[i].grado+"  "+ response[i].letra+"</option>");
                    $('#fkcantidad_alumno_add').val('').trigger('change.select2'); 
                }
            });

          $.get("/plataforma/blackboard/cuestionario/dropperiodoacademico/"+5,function(response){
            $("#fkperiodo_academico_add").empty();
            $("#fkperiodo_academico_add").append("<option value=''> seleccionar </option>");
            for(i=0; i<response.length; i++){
                $("#fkperiodo_academico_add").append("<option value='"+response[i].id+"'> "+response[i].periodo_academico+" "+response[i].tipo_periodo+" </option>");
                $('#fkperiodo_academico_add').val('').trigger('change.select2');
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

         $.get("/academico/nota/dropinscrito/"+id.value,function(response){   
                $("#fkinscripcion_add").empty();
                $("#fkinscripcion_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkinscripcion_add").append("<option value='"+response[i].id+"'> "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkinscripcion_add').val('').trigger('change.select2'); 
                }
            });      
    }

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/academico/nota/nota',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkinscripcion': $('#fkinscripcion_add').val(),
                    'fkcantidad_alumno': $('#fkcantidad_alumno_add').val(),
                    'fkcarrera_curso': $('#fkcarrera_curso_add').val(),
                    'fkperiodo_academico': $('#fkperiodo_academico_add').val(),
                    'nota': $('#nota_add').val(),
                },
                success: function(data) {
                    $('.errorInscripcion').addClass('hidden');
                    $('errorCantidadAlumno').addClass('hidden');
                    $('errorPeriodoAcademico').addClass('hidden');
                    $('.errorNota').addClass('hidden');
                    $('.errorCarreraCurso').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                     if (data.errors.fkinscripcion) {
                            $('.errorInscripcion').removeClass('hidden');
                            $('.errorInscripcion').text(data.errors.fkinscripcion);
                        }

                     if (data.errors.fkcantidad_alumno) {
                            $('.errorCantidadAlumno').removeClass('hidden');
                            $('.errorCantidadAlumno').text(data.errors.fkcantidad_alumno);
                        }

                    if (data.errors.fkperiodo_academico) {
                            $('.errorPeriodoAcademico').removeClass('hidden');
                            $('.errorPeriodoAcademico').text(data.errors.fkperiodo_academico);
                        }

                     if (data.errors.nota) {
                            $('.errorNota').removeClass('hidden');
                            $('.errorNota').text(data.errors.nota);
                        }

                     if (data.errors.fkcarrera_curso) {
                            $('.errorCarreraCurso').removeClass('hidden');
                            $('.errorCarreraCurso').text(data.errors.fkcarrera_curso);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkinscripcion_add').val('');
                            $('#fkperiodo_academico_add').val('');
                            $('#fkcantidad_alumno_add').val('');
                            $('#fkcarrera_curso_add').val('');
                            $('#nota_add').val('');
                            table.ajax.reload();
                        });                          
                    }
                },
            }); 
        });

    </script>
@stop