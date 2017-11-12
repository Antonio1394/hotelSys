<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">


<div class="form-group">
    {!! Form::label('nombre', 'Nombre*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('nombre', null, ['class' => 'form-control',
                                      'id' => 'name',
                                      'required' => 'required',
                                      'placeholder' => 'Nombre Completo',
                                      'data-parsley-required-message' => 'Escriba el nombre']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('apellido', 'Apellido*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('apellido', null, ['class' => 'form-control',
                                      'id' => 'apellido',
                                      'required' => 'required',
                                      'placeholder' => 'Apellido Completo',
                                      'data-parsley-required-message' => 'Escriba el Apellido']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('direccion', null, ['class' => 'form-control',
                                      'id' => 'direccion',
                                      'required' => 'required',
                                      'placeholder' => 'Dirección',
                                      'data-parsley-required-message' => 'Escriba la Dirección']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('telefono', 'Teléfono*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('telefono', null, ['class' => 'form-control',
                                      'id' => 'telefono',
                                      'required' => 'required',
                                      'placeholder' => 'Teléfono',
                                      'data-parsley-required-message' => 'Escriba el Teléfono',
                                      'data-parsley-type' => "digits",
                                      "data-parsley-type-message" => "Escriba un numero",
                                      'data-parsley-minlength' => "8",
                                      "data-parsley-minlength-message" => "Escriba 8 digitos",]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('dpi', 'DPI*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('dpi', null, ['class' => 'form-control',
                                      'id' => 'dpi',
                                      'required' => 'required',
                                      'placeholder' => 'DPI',
                                      'data-parsley-required-message' => 'Escriba el DPI',
                                      'data-parsley-type' => "digits",
                                      "data-parsley-type-message" => "Escriba un numero",
                                      'data-parsley-minlength' => "13",
                                      "data-parsley-minlength-message" => "Escriba 13 digitos",]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('nit', 'NIT', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('nit', null, ['class' => 'form-control',
                                      'id' => 'nit',
                                      'placeholder' => 'NIT',
                                      'data-parsley-type' => "digits",
                                      "data-parsley-type-message" => "Escriba un numero",
                                      'data-parsley-minlength' => "8",
                                      "data-parsley-minlength-message" => "Escriba 8 digitos",]) !!}
    </div>
</div>








<div class="form-group">
    {!! Form::label('ocupacion', 'Ocupación:*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('ocupacion', null, ['class' => 'form-control',
                                      'id' => 'ocupacion',
                                      'placeholder' => 'Ocupación del cliente',
                                      'required' => 'required',
                                      'data-parsley-required-message' => 'Escriba la Ocupación']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::email('email', null, ['class' => 'form-control',
                                      'id' => 'email',
                                      'placeholder' => 'Email del cliente',
                                      'data-parsley-type' => "email",
                                      "data-parsley-type-message" => "Escriba un correo",]) !!}
    </div>
</div>
