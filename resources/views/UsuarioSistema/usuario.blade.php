@extends('adminlte::page')

@section('title', 'SISMEDCHI - Usuario')

@section('content_header')
	<div class="content-header">
        <h1>Usuario
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Usuario</li>
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
                            <th width="1%">Usuario</th>
                            <th width="1%">Nombre1</th>
                            <th width="1%">Nombre2</th>
                            <th width="1%">Apellido1</th>
                            <th width="1%">Apellido2</th>
                            <th width="1%">Accion</th>
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
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpersona_add" id='fkpersona_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorSeleccionarPersona text-center alert alert-danger hidden"></p>
                            </div>                            
                        </div>
                        <div class="form-group has-success">
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="text" class="form-control" id="username_add" placeholder="usuario" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorUsername text-center alert alert-danger hidden"></p>
                            </div>  
                            <div class="col-sm-8">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="email_add" id='email_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorSeleccionarEmail text-center alert alert-danger hidden"></p>
                            </div>                                                        
                        </div> 
                        <div class="form-group has-success">
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="password" class="form-control" id="password_add" name="password" placeholder="password" autofocus>
                                </div>                                                               
                            </div>  
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="password" class="form-control" id="password_confirmation_add" name="password_confirmation" placeholder="confirmacion password" autofocus>
                                </div>                                                               
                                <p class="errorPassword text-center alert alert-danger hidden"></p>
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

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">

        //dropdownlist
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        //Leer
        $(document).ready(function() {
            table_usuario = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('usuario.getdata') !!}',
                columns: [
                    { data: 'username', name: 'username' },
                    { data: 'nombre1', name: 'nombre1' },
                    { data: 'nombre2', name: 'nombre2' },
                    { data: 'apellido1', name: 'apellido1' },
                    { data: 'apellido2', name: 'apellido2' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        // Insert
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorSeleccionarPersona').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/sistema/imedchi/usuario/droppersona/"+7,function(response,id){
                $("#fkpersona_add").empty();
                $("#fkpersona_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpersona_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" | "+ response[i].nombre1+" "+ response[i].nombre2+" "+ response[i].apellido1+" "+ response[i].apellido2+" </option>");
                    $('#fkpersona_add').val('').trigger('change.select2'); 
                }
            }); 

            $("#username_add").click(function(event){
                $.get("/sistema/imedchi/usuario/dropemail/"+$("#fkpersona_add").val(),function(response,departamento){
                    $("#email_add").empty();
                    $("#email_add").append("<option value=''> seleccionar </option>");
                    for(i=0; i<response.length; i++){
                        $("#email_add").append("<option value='"+response[i].email+""+response[i].tipo_email+"'> "+response[i].email+""+response[i].tipo_email+" </option>");
                    }
                });               
            });               
                                                                   
        });

        $('.modal-footer').on('click', '.add', function() {
            $.blockUI({ message: '<h1><img src="busy.gif" /> Por favor espere...</h1>' });
            $.ajax({
                type: 'POST',
                url: '/sistema/imedchi/usuario',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkpersona': $('#fkpersona_add').val(),
                    'email': $('#email_add').val(),
                    'username': $('#username_add').val(),
                    'password': $('#password_add').val(),  
                    'password_confirmation': $('#password_confirmation_add').val(),               
                },
                success: function(data) {
                    $('.errorSeleccionarPersona').addClass('hidden');
                    $('.errorSeleccionarEmail').addClass('hidden');
                    $('.errorUsername').addClass('hidden');
                    $('.errorPassword').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.fkperona) {
                            $('.errorSeleccionarPersona').removeClass('hidden');
                            $('.errorSeleccionarPersona').text(data.errors.fkperona);
                        }

                        if (data.errors.email) {
                            $('.errorSeleccionarEmail').removeClass('hidden');
                            $('.errorSeleccionarEmail').text(data.errors.email);
                        }      
                        if (data.errors.username) {
                            $('.errorUsername').removeClass('hidden');
                            $('.errorUsername').text(data.errors.username);
                        }    
                        if (data.errors.password) {
                            $('.errorPassword').removeClass('hidden');
                            $('.errorPassword').text(data.errors.password);
                        } 
                    } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fkpersona_add').val('');
                            $('#email_add').val('');
                            $('#username_add').val('');
                            $('#password_add').val('');
                            table_usuario.ajax.reload();
                        });                          
                    }
                },
            }); 
        });                  

    </script>    
@stop