@extends('adminlte::page')

@section('title', 'Mantenimiento - Notas')

@section('content_header')
    <div class="content-header">
        <h1>Ingreso de Notas
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Ingreso de Notas</li>
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
                <div class="col-md-5">
                    <small>Carrera Grado / Sección</small>
                    <select class="form-control" name="carrera_id" id="carrera_id" onChange="mostrarCursosDeCarrera(this);">
                      <option value="0">seleccione carrera</option>
                        @foreach ($carreras as $carrera)
                          <option value="{{$carrera->id}}">{{$carrera->carrera}} {{$carrera->grado}} / {{$carrera->seccion}}</option>
                        @endforeach
                    </select>
                </div>  

                <div class="col-md-3">
                    <small>Curso</small>
                    <select class="form-control" name="curso_id" id="curso_id" onChange="filtrarCurso(this);">
                      <option value="0">seleccione carrera</option>
                    </select>
                </div>                                              

                <div class="col-md-2">
                    <small>Año</small> 
                    <select class="form-control" name="anio_id" id="anio_id" onChange="filtrarAnio(this);">
                      <option value="0">seleccione año</option>
                        @foreach ($ciclos as $ciclo)
                          <option value="{{$ciclo->nombre}}">{{$ciclo->nombre}}</option>
                        @endforeach
                    </select>
                </div>  

                <div class="col-md-2">
                    <small>Bimestre</small>
                    <select class="form-control" name="bimestre_id" id="bimestre_id" onChange="filtrarPeriodo(this);">
                      <option value="0">seleccione bimestre</option>
                        @foreach ($periodos as $periodo)
                          <option value="{{$periodo->id}}">{{$periodo->periodo_academico}} {{$periodo->tipo_periodo}}</option>
                        @endforeach
                    </select>
                </div>                                   
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                        <thead >
                            <tr>
                                <th width="25%">Alumno</th>
                                <th width="5%">Primer Nota</th>
                                <th width="5%">Segunda Nota</th>
                                <th width="5%">Tercera Nota</th>
                                <th width="5%">Cuarta Nota</th>
                                <th width="5%">Promedio Actual</th>
                                <th width="5%">Promedio Final</th>
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
                        <h2 class="alumno-nombre"></h2>
                        <div class="col-sm-12">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <label>Nota</label>
                                <i class="fa fa-sticky-note"></i>
                              </div>
                              <input type="text" class="form-control" id="nota_add" placeholder="Ingresar Nota" autofocus>
                            </div>                                                               
                            <p class="errorNota text-center alert alert-danger hidden"></p>
                        </div>
 
                    </form>
                </div>
                <br><br>
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



      <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        var fkperiodo = 0;
        var fkinscripcion = 0;
        var fkcurso = 0;

    $(document).ready(function() {
        let ruta_original = null;

        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', 0);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', 0);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', 0);    
        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', 0); 

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_bimestre,
                columns: [
                    { data: 'alumno', name: 'alumno' },
                    { data: 'nota1', name: 'nota1' },
                    { data: 'nota2', name: 'nota2' },
                    { data: 'nota3', name: 'nota3' },
                    { data: 'nota4', name: 'nota4' },
                    { data: 'promedio_actual', name: 'promedio_actual' },
                    { data: 'promedio_final', name: 'promedio_final' },                                         
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    });    
    
    function mostrarCursosDeCarrera(id) {
        let ruta_original = null;

        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

        var carrera_id = id.value;
        var curso_id = $("#curso_id").val();
        var anio_id = $("#anio_id").val();      
        var bimestre_id = $("#bimestre_id").val();  

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);    
        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', bimestre_id);         

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_bimestre,
                columns: [
                    { data: 'alumno', name: 'alumno' },
                    { data: 'nota1', name: 'nota1' },
                    { data: 'nota2', name: 'nota2' },
                    { data: 'nota3', name: 'nota3' },
                    { data: 'nota4', name: 'nota4' },
                    { data: 'promedio_actual', name: 'promedio_actual' },
                    { data: 'promedio_final', name: 'promedio_final' },                                         
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });        

        $.get("/filtrar/curso/carrera/nota/"+id.value,function(response){
            $("#curso_id").empty();
            $("#curso_id").append('<option value="0">seleccione curso</option>'); 
            for(i=0; i<response.length; i++){
                $("#curso_id").append('<option value="'+response[i].id+'">'+response[i].nombre+'</option>'); 
            }
        });     
    }

    function filtrarCurso(id) {
        let ruta_original = null;

        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

        var carrera_id = $("#carrera_id").val();
        var curso_id =  id.value;
        var anio_id = $("#anio_id").val();
        var bimestre_id = $("#bimestre_id").val();  

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);    
        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', bimestre_id);         

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_bimestre,
                columns: [
                    { data: 'alumno', name: 'alumno' },
                    { data: 'nota1', name: 'nota1' },
                    { data: 'nota2', name: 'nota2' },
                    { data: 'nota3', name: 'nota3' },
                    { data: 'nota4', name: 'nota4' },
                    { data: 'promedio_actual', name: 'promedio_actual' },
                    { data: 'promedio_final', name: 'promedio_final' },                                         
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });  
    } 

    function filtrarAnio(id) {
        let ruta_original = null;

        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

        var carrera_id = $("#carrera_id").val();
        var curso_id =  $("#curso_id").val();
        var anio_id = id.value;
        var bimestre_id = $("#bimestre_id").val();  

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);    
        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', bimestre_id);         

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_bimestre,
                columns: [
                    { data: 'alumno', name: 'alumno' },
                    { data: 'nota1', name: 'nota1' },
                    { data: 'nota2', name: 'nota2' },
                    { data: 'nota3', name: 'nota3' },
                    { data: 'nota4', name: 'nota4' },
                    { data: 'promedio_actual', name: 'promedio_actual' },
                    { data: 'promedio_final', name: 'promedio_final' },                                         
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }  

    function filtrarPeriodo(id) {
        let ruta_original = null;

        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

        var carrera_id = $("#carrera_id").val();
        var curso_id =  $("#curso_id").val();
        var anio_id = $("#anio_id").val();
        var bimestre_id = id.value;  

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);    
        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', bimestre_id);         

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_bimestre,
                columns: [
                    { data: 'alumno', name: 'alumno' },
                    { data: 'nota1', name: 'nota1' },
                    { data: 'nota2', name: 'nota2' },
                    { data: 'nota3', name: 'nota3' },
                    { data: 'nota4', name: 'nota4' },
                    { data: 'promedio_actual', name: 'promedio_actual' },
                    { data: 'promedio_final', name: 'promedio_final' },                                         
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }     

    $(document).on('click', '.agregar-nota', function() {
        nombre1 = $(this).data('nombre');
        fkperiodo = $("#bimestre_id").val();
        fkinscripcion = $(this).data('fkinscripcion');
        fkcurso = $(this).data('fkcarrera_curso');    

        $('.modal-title').text('Agregar Informacion');
        $('.alumno-nombre').text('Alumno, '+nombre1);
        $('.errorNota').addClass('hidden');
        $('#addModal').modal('show');
    }); 

    $('.modal-footer').on('click', '.add', function() {
        $.ajax({
            type: 'POST',
            url: '/academico/nota/nota',
            data: {
                '_token': $('input[name=_token]').val(),
                'fkinscripcion': fkinscripcion,
                'fkcarrera_curso': fkcurso,
                'fkperiodo_academico': fkperiodo,
                'nota': $('#nota_add').val(),
            },
            success: function(data) {
                $('.errorNota').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        $('#addModal').modal('show');
                        swal("Error", "No se ingreso la informacion", "error", {
                          buttons: false,
                          timer: 2000,
                        });
                    }, 500);

                    if (data.errors.nota) {
                            $('.errorNota').removeClass('hidden');
                            $('.errorNota').text(data.errors.nota);
                    }

                } else {
                    swal("Correcto", "Se ingreso la informacion", "success")
                    .then((value) => {
                        fkinscripcion = 0;
                        fkcurso = 0;
                        fkperiodo = 0;
                        $('#nota_add').val('');

                        let ruta_original = null;

                        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

                        var ruta_pasando_carrera = ruta_original.replace('carrera_id', $("#carrera_id").val());
                        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', $("#curso_id").val());
                        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', $("#anio_id").val());    
                        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', $("#bimestre_id").val());         

                        $('#info-table').DataTable({ 

                                destroy: true,   
                                processing: true,
                                serverSide: false,
                                paginate: true,
                                searching: true,
                                ajax: ruta_pasando_bimestre,
                                columns: [
                                    { data: 'alumno', name: 'alumno' },
                                    { data: 'nota1', name: 'nota1' },
                                    { data: 'nota2', name: 'nota2' },
                                    { data: 'nota3', name: 'nota3' },
                                    { data: 'nota4', name: 'nota4' },
                                    { data: 'promedio_actual', name: 'promedio_actual' },
                                    { data: 'promedio_final', name: 'promedio_final' },     
                                    { data: 'action', name: 'action', orderable: false, searchable: false}
                                ]

                        });


                    });                          
                }
            },
        }); 
    });    

    $(document).on('click', '.eliminar-nota', function() {
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
                url: "/academico/nota/estado",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'pknota': id,
                },
                success: function(data) {                 
                    swal("Correcto", "Se elimino la nota", "success")
                    .then((value) => {
                        let ruta_original = null;

                        ruta_original = "{{ route('nota.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id', 'bimestre' => 'bimestre_id']) }}";

                        var ruta_pasando_carrera = ruta_original.replace('carrera_id', $("#carrera_id").val());
                        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', $("#curso_id").val());
                        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', $("#anio_id").val());    
                        var ruta_pasando_bimestre = ruta_pasando_anio.replace('bimestre_id', $("#bimestre_id").val());         

                        $('#info-table').DataTable({ 

                                destroy: true,   
                                processing: true,
                                serverSide: false,
                                paginate: true,
                                searching: true,
                                ajax: ruta_pasando_bimestre,
                                columns: [
                                    { data: 'alumno', name: 'alumno' },
                                    { data: 'nota1', name: 'nota1' },
                                    { data: 'nota2', name: 'nota2' },
                                    { data: 'nota3', name: 'nota3' },
                                    { data: 'nota4', name: 'nota4' },
                                    { data: 'promedio_actual', name: 'promedio_actual' },
                                    { data: 'promedio_final', name: 'promedio_final' },     
                                    { data: 'action', name: 'action', orderable: false, searchable: false}
                                ]

                        });
                    });                                                    
                },
            });                                          
          } else {
            swal("no se realizo el prcceso!");
          }
        });            
    });
    </script>
@stop