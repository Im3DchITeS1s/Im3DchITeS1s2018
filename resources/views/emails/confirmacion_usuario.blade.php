@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
@include('flash::message')  
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Activar Usuario</p>
                <form form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('confirmar.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group has-feedback {{ $errors->has('token') ? 'has-error' : '' }}">
                        <input type="text" name="token" class="form-control" value="{{ old('token') }}"
                               placeholder="código">
                        <span class="fa fa-unlock form-control-feedback"></span>
                        @if ($errors->has('token'))
                            <span class="help-block">
                                <strong>{{ $errors->first('token') }}</strong>
                            </span>
                        @endif
                    </div>                    

                    <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                               placeholder="usuario">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                               placeholder="email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                               placeholder="nuevo password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="confirmar password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">CREAR</button>
            </form>
            <div class="auth-links" style="align-content: center; text-align: center;">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">Sistema IMEDCHI 2018</a>
            </div>
        </div>

    </div>
@stop

@section('adminlte_js')
    <script>
        $('#flash-overlay-modal').modal();
    </script>  
    @yield('js')   
@stop
