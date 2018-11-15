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
                             <th width="25%">Curso</th>
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
                        
                            <!--Drop list de la carrera-->
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Carreras</label>
                                     <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_add" id='fkcarrera_add' required autofocus>
                                    </select> 
                                </div>                                                       
                                <p class="errorCarrera text-center alert alert-danger hidden"></p>
                            </div>
     

                                <!--Drop list de los Cursos-->
                            <div class="col-sm-5">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                  <label>Cursos</label>
                                  <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcurso_add" id='fkcurso_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorCurso text-center alert alert-danger hidden"></p>
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
                        
                      <!--Drop list de la carrera-->
                       <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Carreras</label>
                                    <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcarrera_edit" id='fkcarrera_edit' required autofocus>
                                    </select> 
                                </div>                                                              
                                <p class="errorCarrera text-center alert alert-danger hidden"></p>
                            </div>

                            <!--Drop list del grado-->
                       <div class="col-sm-5">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <label>Cursos</label>
                                    <i class="fa fa-sticky-note"></i>
                                     </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkcurso_edit" id='fkcurso_edit' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorCurso text-center alert alert-danger hidden"></p>
                            </div>

                        </div>
                    </form>                        
                </div>

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
                destroy: true,   
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

        //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorCarrera').addClass('hidden');
            $('.errorCurso').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/mantenimiento/carreracurso/dropcarrera/"+5,function(response,id){
                $("#fkcarrera_add").empty();
                $("#fkcarrera_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcarrera_add').val('').trigger('change.select2'); 
                }
            });              

              $.get("/mantenimiento/carreracurso/dropcurso/"+5,function(response,id){
                $("#fkcurso_add").empty();
                $("#fkcurso_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcurso_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcurso_add').val('').trigger('change.select2'); 
                }
            });      
        });              

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/carreracurso',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcarrera': $('#fkcarrera_add').val(),
                    'fkcurso': $('#fkcurso_add').val(),
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
                     if (data.errors.fkcarrera) {
                            $('.errorCarrera').removeClass('hidden');
                            $('.errorCarrera').text(data.errors.fkcarrera);
                        }

                      if (data.errors.fkcurso) {
                            $('.errorCurso').removeClass('hidden');
                            $('.errorCurso').text(data.errors.fkcurso);
                        }
                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkcarrera_add').val('');
                            $('#fkcurso_add').val('');
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
            $('.errorCarrera').addClass('hidden');
            $('.errorCurso').addClass('hidden');
                                   
            id = $(this).data('id');
            fkcarrera = $(this).data('fkcarrera');
            fkcurso = $(this).data('fkcurso');
            $('#editModal').modal('show');

            
           $.get("/mantenimiento/carreracurso/dropcarrera/"+5,function(response,id){
                $("#fkcarrera_edit").empty();
                $("#fkcarrera_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcarrera_edit').val(fkcarrera).trigger('change.select2'); 
                }
            });  

            $.get("/mantenimiento/carreracurso/dropcurso/"+5,function(response,id){
                $("#fkcurso_edit").empty();
                $("#fkcurso_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcurso_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcurso_edit').val(fkcurso).trigger('change.select2'); 
                }
            });                        
        });      
          

        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/carreracurso/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'fkcarrera': $('#fkcarrera_edit').val(),
                    'fkcurso': $('#fkcurso_edit').val()
                },
                success: function(data) {
                    $('.errorCarrera').addClass('hidden');
                    $('.errorCurso').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.fkcarrera) {
                            $('.errorCarrera').removeClass('hidden');
                            $('.errorCarrera').text(data.errors.fkcarrera);
                        }
                        if (data.errors.fkcurso) {
                            $('.errorCurso').removeClass('hidden');
                            $('.errorCurso').text(data.errors.fkcurso);
                        }
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                            $("#id_edit").val('');
                            $('#fkcarrera_edit').val('');
                            $('fkcurso_edit').val('');
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
                    url: "/mantenimiento/carreracurso/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkcarreracurso': id,
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