@extends('adminlte::page')

@section('title', 'Control de Pago - Pago')

@section('content_header')
    <div class="content-header">
        <h1 align="center">Control Pago
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pago</li>
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
                            <th width="20%">Codigo</th>
                            <th width="20%">Primer Nombre</th>
                            <th width="20%">Segundo Nombre</th>
                            <th width="20%">Primer Apellido</th>
                            <th width="20%">Segundo Apellido</th>
                            <th width="8%">Accion</th>

                        </tr>
                    </thead>
                </table>
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
                        <div class="form-group has-warning">

                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                         <label>Monto</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <input type="text" class="form-control" id="monto_add" placeholder="ingresar monto por favor" autofocus>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"></i></small>
                            </div>
                            <!--Drop list de la categoria-->
                            <div class="col-sm-11">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                       <label>Mes</label>
                                    <small class="pull-right" style="color: red;"></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkmes_add" id='fkmes_add' required autofocus>
                                    </select>
                                </div>
                                <p class="errorMes text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-1">
                                <small class="pull-right" style="color: red;"></i></small>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <textarea type="text" class="form-control" id="observacion_add" placeholder="Observaciones" required autofocus></textarea>
                                </div>
                                <p class="errorObservacion text-center alert alert-danger hidden"></p>
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

     <!-- FUNCIONES AJAX -->
     <script type="text/javascript">
        var id = 0;

        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('pago.getdata') !!}',
                columns: [
                    { data: 'codigo', name: 'codigo' },
                    { data: 'nombre1', name: 'nombre1' },
                    { data: 'nombre2', name: 'nombre2' },
                    { data: 'apellido1', name: 'apellido1' },
                    { data: 'apellido2', name: 'apellido2' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        });
        //Edit
        $(document).on('click', '.edit-modal-pago', function() {
            $('#id_edit').addClass('hidden');
            $('.modal-title').text('Editar Informacion');
            $('.errorNombre').addClass('hidden');
            $('.errorDescripcion').addClass('hidden');
            $('.errorCategoria').addClass('hidden')


            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            $('#descripcion_edit').val($(this).data('descripcion'));
            fkcat = $(this).data('fkcategoria');
            id = $('#id_edit').val();
            $('#editModal').modal('show');


            $.get("/gestionadministrativa/controlpago/pago/dropmes/"+5,function(response,id){
                $("#fkcategoria_edit").empty();
                $("#fkcategoria_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcategoria_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcategoria_edit').val(fkcat).trigger('change.select2');
                }
            });
        });



              $('.modal-footer').on('click', '.edit', function() {
                $.ajax({
                    type: 'PUT',
                    url: '/gestionadministrativa/controlpago/pago/dropmes/' + id,
                    data: {
                        '_token':   $('input[name=_token]').val(),
                        'id':       $("#id_edit").val(),
                        'nombre':   $('#nombre_edit').val(),
                        'descripcion':   $('#descripcion_edit').val(),
                        'fkcategoria': $('#fkcategoria_edit').val()
                    },
                    success: function(data) {
                        $('.errorNombre').addClass('hidden');
                        $('.errorDescripcion').addClass('hidden');
                        $('.errorCategoria').addClass('hidden');


                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se modifico la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.nombre) {
                                $('.errorNombre').removeClass('hidden');
                                $('.errorNombre').text(data.errors.nombre);
                            }
                            if (data.errors.inicio) {
                                $('.errorInicio').removeClass('hidden');
                                $('.errorInicio').text(data.errors.inicio);
                            }
                            if (data.errors.descripcion) {
                                $('.errorFin').removeClass('hidden');
                                $('.errorFin').text(data.errors.fin);
                            }
                            if (data.errors.fktipo_periodo) {
                                $('.errorTipoPeriodo').removeClass('hidden');
                                $('.errorTipoPeriodo').text(data.errors.fktipo_periodo);
                            }
                        } else {
                            swal("Correcto", "Se modifico la informacion", "success")
                                .then((value) => {
                                $("#id_edit").val('');
                                $('#nombre_edit').val('');
                                $('#descripcion_edit').val('');
                                $('#fkcategoria_edit').val('');
                              table.ajax.reload();
                            });
                        }
                    },
                });
            });



     </script>


@stop
