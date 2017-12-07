<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">


<div class="form-group">
    {!! Form::label('producto', 'Producto*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('producto', null, ['class' => 'form-control',
                                      'id' => 'descripcion',
                                      'required' => 'required',
                                      'placeholder' => 'Escriba el Producto u objeto',
                                      'data-parsley-required-message' => 'No puede ir vacio']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('marca', 'Marca*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('marca', null, ['class' => 'form-control',
                                      'id' => 'descripcion',
                                      'required' => 'required',
                                      'placeholder' => 'Escriba la marca del producto',
                                      'data-parsley-required-message' => 'No puede ir vacio']) !!}
    </div>
</div>

<div class="form-group">
  {!! Form::label('cantidad', 'Cantidad*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
          {!! Form::number('cantidad', null, ['class' => 'form-control',
                                        'id' => 'telefono',
                                        'required' => 'required',
                                        'placeholder' => 'Cantidad de ingreso',
                                        'data-parsley-required-message' => 'Escriba una cantidad',
                                        'data-parsley-type' => 'integer',
                                        "data-parsley-type-message" => "Escriba un numero",]) !!}
      </div>
</div>
