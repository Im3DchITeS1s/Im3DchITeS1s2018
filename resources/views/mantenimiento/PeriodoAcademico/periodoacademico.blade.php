@extends('adminlte::page')

@section('title', 'Mantenimiento - PeriodoAcademico')

@section('content_header')
    <div class="content-header">
        <h1>Período Académico
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
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
                            <th width="15%">Ciclo</th>
                            <th width="15%">Tipo de período</th>
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
                        <!--Nombre-->
                        <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Nombre</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre_add" placeholder="Nombre" autofocus maxlength="20">
                                </div>                                                          
                            <small class="control-label">Max: 20| unico</small>
                            <p class="errorNombre text-center alert alert-danger hidden"></p>
                        </div>   
                           
                             <!--Drop list de la Tipo Período-->
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Tipo Período</label>
                                        <i class="fa fa-sticky-note"></i>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_periodo_add" id='fktipo_periodo_add' required autofocus>
                                    </select> 
                                </div>   
                                <small class="control-label">Debe de seleccionar uno</small>                                                     
                                <p class="errorTipoPeriodo text-center alert alert-danger hidden"></p>
                            </div> 

                         <!--Inicio-->
                        <div class="col-sm-6">
                                <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                            <label>Inicio</label>
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="inicio_add" name="inicio_add" placeholder="dd/mm/yyyy" autofocus>
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
                                      <input type="text" class="form-control" id="fin_add" name="fin_add" placeholder="dd/mm/yyyy" autofocus>
                                 </div>                                                               
                                    <p class="errorFin text-center alert alert-danger hidden"></p>
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
                            <div class="col-sm-12">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Nombre</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>

                                    <input type="text" class="form-control" id="nombre_edit" placeholder="editar nombre" autofocus>
                                </div>     
                            </div>
                        
                        <!--Drop actualizar carreragrado-->
                        
                            <div class="col-sm-6">
                                <small class="pull-right" style="color:orange;"></small>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <label>Tipo Período</label>
                                        <i class="fa fa-sticky-note"></i>
                                    </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_periodo_edit" id='fktipo_periodo_edit' required autofocus>
                                    </select> 
                                </div>     
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
                ajax: '{!! route('periodoacademico.getdata') !!}',
                columns: [
                    { data: 'periodo_academico', name: 'periodo_academico' },
                    { data: 'inicio', name: 'inicio' },
                    { data: 'fin', name: 'fin' },
                    { data: 'ciclo', name: 'ciclo' },
                    { data: 'tipo_periodo', name: 'tipo_periodo' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

         //Insertar
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorNombre').addClass('hidden');
            $('.errorInicio').addClass('hidden');
            $('.errorFin').addClass('hidden');
            $('.errorCiclo').addClass('hidden');
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
                    'nombre': $('#nombre_add').val(),
                    'inicio': $('#inicio_add').val(),
                    'fin':    $('#fin_add').val(),
                    'ciclo':  $('#ciclo_add').val(),
                    'fktipo_periodo':    $('#fktipo_periodo_add').val(),
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
                    $('.errorInicio').addClass('hidden');
                    $('.errorFin').addClass('hidden');
                    $('.errorCiclo').addClass('hidden');
                    $('.errorTipoPeriodo').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);
                     if (data.errors.nombre) {
                            $('.errorNombre').removeClass('hidden');
                            $('.errorNombre').text(data.errors.nonmbre);
                        }

                       if (data.errors.inicio) {
                            $('.errorInicio').removeClass('hidden');
                            $('.errorInicio').text(data.errors.inicio);
                        }

                        if (data.errors.fin) {
                            $('.errorFin').removeClass('hidden');
                            $('.errorFin').text(data.errors.fin);
                        }

                        if (data.errors.ciclo) {
                            $('.errorCiclo').removeClass('hidden');
                            $('.errorCiclo').text(data.errors.ciclo);
                        }

                        if (data.errors.fktipo_periodo) {
                            $('.errorTipoPeriodo').removeClass('hidden');
                            $('.errorTipoPeriodo').text(data.errors.fktipo_periodo);
                        }

                     } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#nombre').val('');
                            $('#inicio').val('');
                            $('#fin').val('');
                            $('#ciclo').val('');
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
            $('.errorNombre').addClass('hidden');
            $('.errorInicio').addClass('hidden');
            $('.errorFin').addClass('hidden');
            $('.errorCiclo').addClass('hidden');
            $('.errorTipoPeriodo').addClass('hidden');
                                
            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            $('#inicio_edit').val($(this).data('inicio'));
            $('#fin').val($(this).data('fin_edit'));
            $('#fktipo_periodo').val($(this).data('fktipo_periodo_edit'));
            id = $('#id_edit').val();
            fktipo_periodo = $(this).data('fktipo_periodo');
            $('#editModal').modal('show');

            
            $.get("/mantenimiento/periodoacademico/droptiperiodo/"+5,function(response,id){
                $("#fktipo_periodo_edit").empty();
                $("#fktipo_periodo_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                $("#fktipo_periodo_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                $('#fktipo_periodo_edit').val(fktipo_periodo).trigger('change.select2'); 
                }
            });      
            }); 
     
          

          $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: '/mantenimiento/periodoacademico/' + id,
                data: {
                    '_token':   $('input[name=_token]').val(),
                    'id':       $("#id_edit").val(),
                    'nombre':   $('#nombre_edit').val(),
                    'inicio':   $('#inicio_edit').val(),
                    'fin':      $('#fin_edit').val(),
                    'fktipo_periodo': $('#fktipo_periodo_edit').val()
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
                    $('.errorInicio').addClass('hidden');
                    $('.errorFin').addClass('hidden');
                    $('.errorTipoPeriodo').addClass('hidden')
               

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
                        if (data.errors.fin) {
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
                            $('#inicio_edit').val('');
                            $('#fin_edit').val('');
                            $('#fktipo_periodo_edit').val('');
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