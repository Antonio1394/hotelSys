<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">


<div class="form-group">
    {!! Form::label('noHabitacion', '# Habitación*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('noHabitacion', null, ['class' => 'form-control',
                                      'id' => 'noHabitacion',
                                      'required' => 'required',
                                      'placeholder' => 'Ingrese un número',
                                      'data-parsley-required-message' => 'No puede ir vacio']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('nivel', 'Nivel*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('nivel', null, ['class' => 'form-control',
                                      'id' => 'nivel',
                                      'required' => 'required',
                                      'placeholder' => 'Ingrese el nivel del hotel',
                                      'data-parsley-required-message' => 'No puede ir vacio']) !!}
    </div>
</div>


<div class="form-group">
  {!! Form::label('tarifa', 'Costo*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
      <div class="input-group">
        <span class="input-group-addon">Q</span>
          {!! Form::number('tarifa', null, ['class' => 'form-control',
                                        'id' => 'telefono',
                                        'required' => 'required',
                                        'placeholder' => 'Costo en quetzales',
                                        'data-parsley-required-message' => 'Escriba el costo',
                                        'data-parsley-type' => 'integer',
                                        "data-parsley-type-message" => "Escriba un numero",]) !!}
        <span class="input-group-addon">.00</span>
      </div>
    </div>
</div>
