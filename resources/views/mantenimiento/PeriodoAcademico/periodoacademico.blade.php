@extends('adminlte::page')

@section('title', 'Mantenimiento - PeriodoAcademico')

@section('content_header')
    <div class="content-header">
        <h1>Período Académico
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Período Académico</li>
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
                            <th width="15%">Nombre</th>
                            <th width="15%">Inicio</th>
                            <th width="15%">Fin</th>
                            <th width="15%">Tipo de período</th>
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
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                        <div class="form-group has-warning">
                            <div class="col-sm-12">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                        
                            <!--Inicio-->
                            <div class="col-sm-6">
                                <div class="input-group date" data-provide="datepicker">
                                    <div class="input-group-addon">
                                            <label>Inicio</label>
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="inicio_edit" name="inicio_edit" placeholder="dd/mm/yyyy" autofocus>
                                </div>                                                               
                                <p class="errorInicio text-center alert alert-danger hidden"></p>
                            </div>

                             <!--Fin-->
                            <div class="col-sm-6">
                                <div class="input-group date" data-provide="datepicker">
                                    <div class="input-group-addon">
                                            <label>Fin</label>
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="fin_edit" name="fin_edit" placeholder="dd/mm/yyyy" autofocus>
                                </div>                                                               
                                <p class="errorFin text-center alert alert-danger hidden"></p>
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

        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
        });  

        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({  
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('periodoacademico.getdata') !!}',
                columns: [
                    { data: 'periodo_academico', name: 'periodo_academico' },
                    { data: 'inicio', name: 'inicio' },
                    { data: 'fin', name: 'fin' },
                    { data: 'tipo_periodo', name: 'tipo_periodo' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

         //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorInicio').addClass('hidden');
            $('.errorFin').addClass('hidden');
            $('.errorTipoPeriodo').addClass('hidden');
            $('#addModal').modal('show');

                   
              $.get("/mantenimiento/periodoacademico/droptiperiodo/"+5,function(response,id){
                $("#fktipo_periodo_add").empty();
                $("#fktipo_periodo_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                $("#fktipo_periodo_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                $('#fktipo_periodo_add').val('').trigger('change.select2'); 
                }
            });      
            });              

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/mantenimiento/periodoacademico',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'inicio': $('#inicio_add').val(),
                    'fin':    $('#fin_add').val(),
                    'fktipo_periodo':    $('#fktipo_periodo_add').val(),
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
                    $('.errorInicio').addClass('hidden');
                    $('.errorFin').addClass('hidden');
                    $('.errorTipoPeriodo').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                       if (data.errors.inicio) {
                            $('.errorInicio').removeClass('hidden');
                            $('.errorInicio').text(data.errors.inicio);
                        }

                        if (data.errors.fin) {
                            $('.errorFin').removeClass('hidden');
                            $('.errorFin').text(data.errors.fin);
                        }

                        if (data.errors.fktipo_periodo) {
                            $('.errorTipoPeriodo').removeClass('hidden');
                            $('.errorTipoPeriodo').text(data.errors.fktipo_periodo);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#inicio').val('');
                            $('#fin').val('');
                            $('#fktipo_periodo').val('');
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
            $('.errorInicio').addClass('hidden');
            $('.errorFin').addClass('hidden');
            $('.errorTipoPeriodo').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            $('#inicio_edit').val($(this).data('inicio'));
            $('#fin_edit').val($(this).data('fin'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');     
        }); 
     
          

        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/periodoacademico/' + id,
                data: {
                    '_token':   $('input[name=_token]').val(),
                    'id':       $("#id_edit").val(),
                    'inicio':   $('#inicio_edit').val(),
                    'fin':      $('#fin_edit').val()
                },
                success: function(data) {
                    $('.errorInicio').addClass('hidden');
                    $('.errorFin').addClass('hidden');            

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.inicio) {
                            $('.errorInicio').removeClass('hidden');
                            $('.errorInicio').text(data.errors.inicio);
                        }
                        if (data.errors.fin) {
                            $('.errorFin').removeClass('hidden');
                            $('.errorFin').text(data.errors.fin);
                        }
                    } else {
                        swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                            $("#id_edit").val('');
                            $('#inicio_edit').val('');
                            $('#fin_edit').val('');
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
                    url: "/mantenimiento/periodoacademico/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'pkperiodoacademico': id,
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