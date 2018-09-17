@extends('adminlte::page')

@section('title', 'Mantenimiento - CarreraGrado')

@section('content_header')
    <div class="content-header">
        <h1>Carrera Grado
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Carrera Grado</li>
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
                             <th width="25%">Grado</th>
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
     

                                <!--Drop list de los grados-->
                            <div class="col-sm-5">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkgrado_add" id='fkgrado_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorGrado text-center alert alert-danger hidden"></p>
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
                       <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
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
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkgrado_edit" id='fkgrado_edit' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorGrado text-center alert alert-danger hidden"></p>
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
                ajax: '{!! route('carreragrado.getdata') !!}',
                columns: [
                    { data: 'carrera', name: 'carrera' },
                    { data: 'grado', name: 'grado' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

            //Insert
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorCarrera').addClass('hidden');
            $('.errorGrado').addClass('hidden');
            $('#addModal').modal('show');

          $.get("/mantenimiento/carreragrado/dropcarrera/"+5,function(response,id){
                $("#fkcarrera_add").empty();
                $("#fkcarrera_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcarrera_add').val('').trigger('change.select2'); 
                }
            }); 

           $.get("/mantenimiento/carreragrado/dropgrado/"+5,function(response,id){
                $("#fkgrado_add").empty();
                $("#fkgrado_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkgrado_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkgrado_add').val('').trigger('change.select2'); 
                }
            }); 

           $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/carreragrado/',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcarrera': $('#fkcarrera_add').val(),
                    'fkgrado': $('#fkgrado_add').val(),
                    
                },
                success: function(data) {
                    $('.errorCarrera').addClass('hidden');
                    $('.errorGrado').addClass('hidden');

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
           
                    if (data.errors.fkgrado) {
                            $('.errorGrado').removeClass('hidden');
                            $('.errorGrado').text(data.errors.fkgrado);
                        }
                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkcarrera_add').val('');
                            $('#fkgrado_add').val('');
                            table.ajax.reload();
                        });                          
                    }
                },
            }); 
        });
    });


//Edit
 $(document).on('click', '.edit-modal', function() {    
            $('#id_edit').addClass('hidden');                               
            $('.modal-title').text('Editar Informacion');
            $('.errorCarrera').addClass('hidden');
            $('.errorGrado').addClass('hidden');
            $('#editModal').show('modal');
                                
            $('#id_edit').val($(this).data('id'));
            
            id = $('#id_edit').val();
            fkcarrera = $(this).data('fkcarrera');

            $.get("/mantenimiento/carreragrado/dropcarrera/"+5,function(response,id){
                $("#fkcarrera_edit").empty();
                $("#fkcarrera_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcarrera_edit').val(fkcarrera).trigger('change.select2'); 
                }
            }); 

          
            fkgrado = $(this).data('fkgrado');


             $.get("/mantenimiento/carreragrado/dropgrado/"+5,function(response,id){
                $("#fkgrado_edit").empty();
                $("#fkgrado_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkgrado_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkgrado_edit').val(fkgrado).trigger('change.select2'); 
                }
            });           
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/carreragrado/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'fkcarrera': $('#fkcarrera_edit').val(),
                    'fkgrado': $('#fkgrado_edit').val(),
                },
                success: function(data) {
                    $('.errorCarrera').addClass('hidden');
                    $('.errorGrado').addClass('hidden');

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
                          if (data.errors.fkgrado) {
                            $('.errorGrado').removeClass('hidden');
                            $('.errorGrado').text(data.errors.fkgrado);
                        }
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                        .then((value) => {
                         $("#id_edit").val('');
                         $('#fkcarrera_edit').val('');
                         $('#fkgrado_edit').val('');
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
                    url: "/mantenimiento/carreragrado/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkcarreragrado': id,
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