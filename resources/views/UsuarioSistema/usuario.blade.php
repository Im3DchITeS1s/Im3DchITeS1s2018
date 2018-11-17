@extends('adminlte::page')

@section('title', 'SISMEDCHI - Usuario')

@section('content_header')
	<div class="content-header">
        <h1>Usuario</h1>
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
                        </tr>
                    </thead>
                </table>         
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
                ]
            });
        });                

    </script>    
@stop