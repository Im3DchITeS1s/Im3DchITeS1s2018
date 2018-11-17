@extends('adminlte::page')

@section('title', 'Control de Pago - Salario')

@section('content_header')
    <div class="content-header">
        <h1 align="center">Control Pago Administracion
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Salario</li>
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

            <div class="box-body">
             <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                            <thead >
                                <tr>
                                    <th width="20%">Codigo</th>
                                    <th width="20%">Nombre</th>
                                     <th width="20%">Tipo Persona</th>
                                    <th width="8%">Accion</th>
                                </tr>
                            </thead>
                        </table>
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
                        <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                              </div>
                                <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                name="fkmes" id='fkmes' required autofocus>
                                </select>
                            </div>
                            <p class="errorMes text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: black;"><i class="fa fa-calculator"></i></small>
                              </div>
                              <input type="text" class="form-control" id="periodo" placeholder="Cantida de Periodos"  disabled="true"required autofocus>
                            </div>
                            <p class="errorPeriodo text-center alert alert-danger hidden"></p>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: black;"><i class="fa fa-calculator"></i></small>
                              </div>
                              <input type="text" class="form-control" id="valorperiodo" placeholder="Varlor por periodo"  required autofocus>
                            </div>
                            <p class="errorvalorperiodo text-center alert alert-danger hidden"></p>
                        </div>

                
                        <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                              </div>
                              <input type="text" class="form-control" id="pago" placeholder="Salario Total" required autofocus>
                            </div>
                            <p class="errorPago text-center alert alert-danger hidden"></p>
                        </div><br><br>

                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="info-table-pago" width="100%">
                                <thead >
                                    <tr>
                                        <th width="1%">Codigo</th>
                                        <th width="1%">Mes</th>
                                        <th width="1%">Pago Q</th>
                                        <th width="1%">Accion</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        //Leer
       $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('salario.getdata') !!}',
                columns: [
                    { data: 'codigo', name: 'codigo' },
                    { data: 'persona', name: 'persona' },
                     { data: 'tipo', name:  'tipo' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });
         //Modal
        $(document).on('click', '.edit-modal-salario', function() {
            $('.modal-title').text('Agregar Pago Salario');
            $('.errorMes').addClass('hidden');
            $('.errorPeriodo').addClass('hidden');
            $('.errorPago').addClass('hidden');
            $('.errorvalorperiodo').addClass('hidden');

            id = $(this).data('id');
            $('#editModal').modal('show');

            $.get("/gestionadministrativa/controlpago/pago/dropmes/"+5,function(response){
                $("#fkmes").empty();
                $("#fkmes").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    verificarMes(response[i].id, response[i].nombre, id);
                }
            });

            function verificarMes(idmes, nombremes, fkpersona)
            {
                $.get("/meses/pagos/alumno/"+fkpersona+"/"+idmes,function(data){
                    console.log(data);
                    if(data === 0)
                    {
                        $("#fkmes").append("<option value='"+idmes+"'> "+nombremes+" </option>");
                        $('#fkmes').val('').trigger('change.select2');
                    }

                });
            }

            let ruta_original = null;

            ruta_original = "{{ route('pago.getdatapago', ['fkspersona' => 'id']) }}";

            var ruta_pasando_inscripcion = ruta_original.replace('id', id);

            table_pago = $('#info-table-pago').DataTable({
                destroy: true,
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_inscripcion,
                columns: [
                    { data: 'mes', name: 'mes'},
                    { data: 'pago', name: 'pago'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });


        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'POST',
                url: '/gestionadministrativa/controlpago/slario',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkmes': $("#fkmes").val(),
                    'fktipo_pago':   2,
                    'fkspersona': id,
                    'pago': $('#pago').val()
                },
                success: function(data) {
                    $('.errorMes').addClass('hidden');
                    $('.errorPago').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.fkmes) {
                            $('.errorMes').removeClass('hidden');
                            $('.errorMes').text(data.errors.fkmes);
                        }
                        if (data.errors.pago) {
                            $('.errorPago').removeClass('hidden');
                            $('.errorPago').text(data.errors.pago);
                        }
                    } else {
                        swal("Correcto", "Se agrego la informacion", "success")
                            .then((value) => {
                            $('#pago').val('');

                            $.get("/gestionadministrativa/controlpago/pago/dropmes/"+5,function(response){
                                $("#fkmes").empty();
                                $("#fkmes").append("<option value=''> seleccionar </option>");
                                for(i=0; i<response.length; i++){
                                    verificarMes(response[i].id, response[i].nombre, id);
                                }
                            });

                            function verificarMes(idmes, nombremes, fkinscripcion)
                            {
                                $.get("/meses/pagos/alumno/"+fkinscripcion+"/"+idmes,function(data){
                                    console.log(data);
                                    if(data === 0)
                                    {
                                        $("#fkmes").append("<option value='"+idmes+"'> "+nombremes+" </option>");
                                        $('#fkmes').val('').trigger('change.select2');
                                    }

                                });
                            }

                            let ruta_original = null;

                            ruta_original = "{{ route('pago.getdatapago', ['fkinscripcion' => 'id']) }}";

                            var ruta_pasando_inscripcion = ruta_original.replace('id', id);

                            table_pago = $('#info-table-pago').DataTable({
                                destroy: true,
                                processing: true,
                                serverSide: false,
                                paginate: true,
                                searching: true,
                                ajax: ruta_pasando_inscripcion,
                                columns: [
                                    { data: 'mes', name: 'mes'},
                                    { data: 'pago', name: 'pago'},
                                    { data: 'action', name: 'action', orderable: false, searchable: false}
                                ]
                            });
                        });
                    }
                },
            });
        });

    </script>
    @stop
