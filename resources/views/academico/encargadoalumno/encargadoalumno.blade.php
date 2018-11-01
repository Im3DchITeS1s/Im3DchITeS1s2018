@extends('adminlte::page')

@section('title', 'Mantenimiento - Encargado_Alumnos')

@section('content_header')
    <div class="content-header">
        <h1>Encargados de los Alumnos
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Encargados de los Alumnos</li>
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
                            <th width="25%">Alumnos</th>
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
                            
                                <!--Drop list del Estudiante-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Estudiantes</label>
                                     <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkalumno_add" id='fkalumno_add' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorEstudiante text-center alert alert-danger hidden"></p>
                            </div>
     

                                <!--Drop list del Encargado-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Encargados</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkencargado_add" id='fkencargado_add' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorEncargado text-center alert alert-danger hidden"></p>
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
                            <!--Drop list del Estudiante-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Estudiantes</label>
                                     <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkalumno_edit" id='fkalumno_edit' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorEstudiante text-center alert alert-danger hidden"></p>
                            </div>
     

                                <!--Drop list del Encargado-->
                             <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Encargados</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkencargado_edit" id='fkencargado_edit' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorEncargado text-center alert alert-danger hidden"></p>
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
                ajax: '{!! route('EncargadoAlumno.getdata') !!}',
                columns: [
                    { data: 'alumno', name: 'alumno' },          
                ]
            });
        });

    
  //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorEstudiante').addClass('hidden');
            $('.errorEncargado').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/academico/inscripcion/dropestudiante/"+7,function(response,id){
                $("#fkalumno_add").empty();
                $("#fkalumno_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkalumno_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkalumno_add').val('').trigger('change.select2'); 
                }
            });

                 $.get("/academico/inscripcion/dropencargado/"+7,function(response,id){
                $("#fkencargado_add").empty();
                $("#fkencargado_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkencargado_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkencargado_add').val('').trigger('change.select2'); 
                }
            });                  
                  

           
            });              

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/academico/encargadoalumno/encargadoalumno',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkalumno': $('#fkalumno_add').val(),
                    'fkencargado': $('#fkencargado_add').val(),
                },
                success: function(data) {
                    $('.errorEstudiante').addClass('hidden');
                    $('.errorEstudiante').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);
                     if (data.errors.fkalumno) {
                            $('.errorEstudiante').removeClass('hidden');
                            $('.errorEstudiante').text(data.errors.fkalumno);
                        }

                      if (data.errors.fkencargado) {
                            $('.errorEncargado').removeClass('hidden');
                            $('.errorEncargado').text(data.errors.fkencargado);
                        }
            

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkalumno_add').val('');
                            $('#fkencargado_add').val('');
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
            $('.errorEstudiante').addClass('hidden');
            $('.errorEncargado').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            $('#fkalumno_edit').val($(this).data('fkalumno'));
            $('#fkencargado_edit').val($(this).data('fkencargado'));
    
            id = $('#id_edit').val();
            fkalumno = $(this).data('fkalumno');
            fkencargado = $(this).data('fkencargado');
            $('#editModal').modal('show');

            
           $.get("/academico/inscripcion/dropestudiante/"+7,function(response,id){
                $("#fkalumno_edit").empty();
                $("#fkalumno_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkalumno_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkalumno_edit').val(fkalumno).trigger('change.select2'); 
                }
            });             
            }); 

             $.get("/academico/inscripcion/dropencargado/"+7,function(response,id){
                $("#fkencargado_edit").empty();
                $("#fkencargado_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkencargado_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkencargado_edit').val(fkencargado).trigger('change.select2'); 
                }
            });        
          

          $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/academico/encargadoalumno/encargadoalumno' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'fkalumno': $('#fkalumno_edit').val(),
                    'fkencargado': $('#fkencargado_edit').val()
                },
                success: function(data) {
                    $('.errorEstudiante').addClass('hidden');
                    $('.errorEncargado').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.fkalumno) {
                            $('.errorEstudiante').removeClass('hidden');
                            $('.errorEstudiante').text(data.errors.fkalumno);
                        }
                        if (data.errors.fkencargado) {
                            $('.errorEncargado').removeClass('hidden');
                            $('.errorEncargado').text(data.errors.fkencargado);
                        }
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                            $("#id_edit").val('');
                            $('#fkalumno_edit').val('');
                            $('fkencargado_edit').val('');
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
                    url: "/academico/encargadoalumno/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkencargadoalumno': id,
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