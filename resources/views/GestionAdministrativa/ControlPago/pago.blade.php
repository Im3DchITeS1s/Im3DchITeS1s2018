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

            <div class="box-body">

                <div class="row">
                    <div class="col-md-9">            
                        <small>Seleccionar la Carrera y Grado</small>
                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                        name="fkcarrera_grado" id='fkcarrera_grado' onchange="llenardropSeccion(this);"  required autofocus>
                        </select>      
                    </div> 

                    <div class="col-sm-3">
                        <small>Seleccionar la Seccion</small>
                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                        name="fkseccion" id='fkseccion' onchange="llenarAlumnoFiltro(this);" required autofocus>
                        </select>    
                    </div>
                </div>

                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                            <thead >
                                <tr>
                                    <th width="20%">Codigo</th>
                                    <th width="20%">Nombre del Alumno</th>
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
                        <div class="col-sm-8">
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

                        <div class="col-sm-4">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                              </div>
                              <input type="text" class="form-control" id="pago" placeholder="monto" required autofocus>
                            </div>  
                            <p class="errorPago text-center alert alert-danger hidden"></p>
                        </div>                      
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

     <!-- FUNCIONES AJAX -->
    <script type="text/javascript">
        var id = 0;

         //dropdownlist
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        //Leer
        $(document).ready(function() {
            let ruta_original = null;

            ruta_original = "{{ route('pago.getdata', ['fkcantidad_alumno' => 'cantidadalumno_id', 'ciclo' => 'ciclo_id']) }}";

            var ruta_pasando_cantidadalumno = ruta_original.replace('cantidadalumno_id', 0);
            var ruta_pasando_ciclo = ruta_pasando_cantidadalumno.replace('ciclo_id', 0);  

            table = $('#info-table').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_ciclo,
                columns: [
                    { data: 'codigo', name: 'codigo'},
                    { data: 'alumno', name: 'alumno'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

             $.get("/gestionadministrativa/controlpago/pago/dropcarrerasgrados/"+5,function(response, id){
                $("#fkcarrera_grado").empty();
                $("#fkcarrera_grado").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcarrera_grado").append("<option value='"+response[i].id+"'> "+response[i].carrera+" | "+ response[i].grado+"</option>");
                    $('#fkcarrera_grado').val('').trigger('change.select2'); 

                }
            });  

        });

        function llenardropSeccion(id) 
        {
            $.get("/gestionadministrativa/controlpago/pago/filtro/secciondecarrera/"+id.value,function(response,id){
                $("#fkseccion").empty();
                $("#fkseccion").append("<option value='0'> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkseccion").append("<option value='"+response[i].id+"'> "+response[i].seccion+" </option>");
                    $('#fkseccion').val('0').trigger('change.select2'); 
                }
            }); 
        }

        function llenarAlumnoFiltro(id) 
        {
            let ruta_original = null;

            ruta_original = "{{ route('pago.getdata', ['fkcantidad_alumno' => 'cantidadalumno_id', 'ciclo' => 'ciclo_id']) }}";

            var ruta_pasando_cantidadalumno = ruta_original.replace('cantidadalumno_id', id.value);
            var ruta_pasando_ciclo = ruta_pasando_cantidadalumno.replace('ciclo_id', 0);  

            table = $('#info-table').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_ciclo,
                columns: [
                    { data: 'codigo', name: 'codigo'},
                    { data: 'alumno', name: 'alumno'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }

        //Edit
    $(document).on('click', '.edit-modal-pago', function() {                                 
        $('.modal-title').text('Agregar Pago');
        $('.errorMes').addClass('hidden');
        $('.errorPago').addClass('hidden');
                
        id = $(this).data('id');
        $('#editModal').modal('show');

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
    
     
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'POST',
            url: '/gestionadministrativa/controlpago/pago',
            data: {
                '_token': $('input[name=_token]').val(),
                'fkmes': $("#fkmes").val(),
                'fktipo_pago':   2,
                'fkinscripcion': id,
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

     $(document).on('click', '.delete-modal-pago', function() {
            var idoriginal = $(this).data('id');
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
                    url: "/gestionadministrativa/controlpago/pago/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': idoriginal,
                        'fkestado': $(this).data('fkestado')
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {

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
                    },
                });                                          
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });


    </script>

@stop
