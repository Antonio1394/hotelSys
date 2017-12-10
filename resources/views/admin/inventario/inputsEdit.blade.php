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
