@extends('auth.layout.main')
@section('content')

    <div class="account-pages"></div>
    <div class="clearfix"></div>
        <br>
        <br>
        <br>
        <br>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center">
                    <strong class="text-custom">Sistema Carmiña Isabel</strong>
                </h3>
            </div>
            <div class="panel-body">
                <div class="signin-form">
                    {!! Form::open(["url" => 'auth/login', "method" => "POST", 'class' => 'form-horizontal m-t-20', 'id' => 'signin-form_id']) !!}
                        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

                        <div class="form-group w-icon">
                            {!! Form::text('user', old('user'), ['class' => 'form-control', 'id' => 'user', "placeholder" => "Usuario", "required" => "required", "data-parsley-required-message" => "Escriba el usuario"]) !!}
                        </div>

                        <div class="form-group w-icon">
                            {!! Form::password("password", ["class" => "form-control", "placeholder" => "Contraseña", "id" => 'password', "required" => "required", "data-parsley-required-message" => "Escriba la contraseña", 'data-parsley-minlength' => "5", "data-parsley-minlength-message" => "Escriba 8 o mas caracteres"]) !!}
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-pink btn-block text-uppercase waves-effect waves-light">Iniciar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>



@endsection
