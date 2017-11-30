<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">


<div class="form-group">
    {!! Form::label('descripcion', 'Producto*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('descripcion', null, ['class' => 'form-control',
                                      'id' => 'descripcion',
                                      'required' => 'required',
                                      'placeholder' => 'Escriba el Producto u objeto',
                                      'data-parsley-required-message' => 'No puede ir vacio']) !!}
    </div>
</div>
<div class="form-group">
  {!! Form::label('precio', 'Costo*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
      <div class="input-group">
        <span class="input-group-addon">Q</span>
          {!! Form::number('precio', null, ['class' => 'form-control',
                                        'id' => 'telefono',
                                        'required' => 'required',
                                        'placeholder' => 'Teléfono',
                                        'data-parsley-required-message' => 'Escriba el costo',
                                        'data-parsley-type' => 'integer',
                                        "data-parsley-type-message" => "Escriba un numero",]) !!}
        <span class="input-group-addon">.00</span>
      </div>
    </div>

</div>
