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
    {!! Form::label('telefono', 'Teléfono*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('telefono', null, ['class' => 'form-control',
                                      'id' => 'telefono',
                                      'required' => 'required',
                                      'placeholder' => 'Teléfono',
                                      'data-parsley-required-message' => 'Escriba el Teléfono',
                                      'data-parsley-type' => 'integer',
                                      "data-parsley-type-message" => "Escriba un numero",
                                      'data-parsley-minlength' => "8",
                                      "data-parsley-minlength-message" => "Escriba 8 digitos",]) !!}
    </div>
</div>
