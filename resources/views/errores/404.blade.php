@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - ERROR')

@section('content_header')
	<div class="content-header">
        <h1>Error 404</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Errores</a></li>
            <li class="active">404</li>
        </ol>                      
	</div>    
@stop

@section('content')
	<div class="error-page">
        <h2 class="headline text-yellow">404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! A ocurrido un Error.</h3>

          <p>
            Ya estamos trabajando para solucionar el inconveniente.
            Por favor!, dar click en <a href="/">retornar al menu</a>.
          </p>
        </div>
    </div>
@stop