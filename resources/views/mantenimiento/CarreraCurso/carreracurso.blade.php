@extends('adminlte::page')

@section('title', 'Mantenimiento - CarreraCurso')

@section('content_header')
    <div class="content-header">
        <h1>Carrera Curso
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Carrera Curso</li>
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
                            <th width="25%">Carrera</th>
                            <th width="25%">Cursos</th>
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
                                <!--Drop list de la carrera-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_add" id='fkcarrera_add' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorCarrera text-center alert alert-danger hidden"></p>
                            </div>
     

                                <!--Drop list de los cursos-->
                            <div class="col-sm-5">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcurso_add" id='fkcurso_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="erroCurso text-center alert alert-danger hidden"></p>
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
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                            </div>

                            <!--Drop list de la carrera-->
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                name="fkcarrera_edit" id='fkcarrera_edit' required autofocus>
                                </select> 
                                <p class="errorCarrera text-center alert alert-danger hidden"></p>
                        </div>

                            <!--Drop list del estado-->
                        <div class="form-group has-warning">
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                name="fkcurso_edit" id='fkcurso_edit' required autofocus>
                                </select> 
                                <p class="errorCurso text-center alert alert-danger hidden"></p>               
                            </div>
                        </div>

                        <!--Drop list del estado-->
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
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: "true",
                placeholder: "Seleccionar una o mas opciones",
            });
        });

     $(document).ready(function() {
            table = $('#info-table').DataTable({  
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('carreracurso.getdata') !!}',
                columns: [
                    { data: 'carrera', name: 'carrera' },
                    { data: 'curso', name: 'curso' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

            //Insert
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorCarrera').addClass('hidden');
            $('.errorCurso').addClass('hidden');
            $('#addModal').modal('show');

          $.get("/mantenimiento/carreracurso/dropcarrera/"+1,function(response,id){
                $("#fkcarrera_add").empty();
                $("#fkcarrera_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcarrera_add').val('').trigger('change.select2'); 
                }
            }); 

           $.get("/mantenimiento/carreracurso/dropcarrera/"+1,function(response,id){
                $("#fkcurso_add").empty();
                $("#fkcurso_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcurso_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcurso_add').val('').trigger('change.select2'); 
                }
            }); 

           $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/carreracurso',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcarrera': $('#fkcarrera').val(),
                    'fkcurso': $('#fkcurso').val(),
                    
                },
                success: function(data) {
                    $('.errorCarrera').addClass('hidden');
                    $('.errorCurso').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                     if (data.errors.fktipo_persona) {
                            $('.errorCarrera').removeClass('hidden');
                            $('.errorCarrera').text(data.errors.fktipo_persona);
                        }
           
                    if (data.errors.fktipo_persona) {
                            $('.errorCurso').removeClass('hidden');
                            $('.errorCurso').text(data.errors.fktipo_persona);
                        }
                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkcarrera_add').val('');
                            $('#fkcurso').val('');
                            table.ajax.reload();
                        });                          
                    }
                },
            }); 
        });
    });

        
       


       
    </script>
@stop