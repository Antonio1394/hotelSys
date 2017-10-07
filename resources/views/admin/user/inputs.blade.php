<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">


<div class="form-group">
    {!! Form::label('name', 'Nombre*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control',
                                      'id' => 'name',
                                      'required' => 'required',
                                      'placeholder' => 'Nombre Completo',
                                      'data-parsley-required-message' => 'Escriba el nombre completo']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('user', 'Usuario*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('user', null, ['class' => 'form-control',
                                      'id' => 'user',
                                      'required' => 'required',
                                      'placeholder' => 'Usuario',
                                      'data-parsley-required-message' => 'Escriba el Usuario']) !!}
    </div>
</div>

<div class="form-group">
      {!! Form::label('password', 'Password*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
      {!! Form::password('password',  ['class' => 'form-control',
                                       'id' => 'password',
                                       'required' => 'required',
                                       'placeholder' => 'Contraseña',
                                       'data-parsley-minlength' => "8",
                                       "data-parsley-minlength-message" => "Escriba 8 Carácteres",
                                       "data-parsley-required-message" => "Escriba la Contraseña"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tipo', 'Tipo de Usuario*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::select('tipo', config('tipo'), null, ['class' => 'form-control',
                                                        'id' => 'tipo',
                                                        'required' => 'required',
                                                        'data-parsley-required-message' => 'Escoja una opción']) !!}
    </div>
</div>
