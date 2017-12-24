{!! Form::open(['route' => 'admin.cliente.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'createForm', 'data-parsley-validate' => '',]) !!}
    <!-- @include('admin.cliente.inputs') -->
    <h4>Precio Normal: Q{{$habitacion->tarifa}}</h4>
    <div class="form-group">
      {!! Form::label('precio', 'Cantidad Descuento*', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-9">
          <div class="input-group">
            <span class="input-group-addon">Q</span>
              {!! Form::number('precio', null, ['class' => 'form-control',
                                            'id' => 'txtValor',
                                            'required' => 'required',
                                            'placeholder' => 'Costo en quetzales',
                                            'data-parsley-required-message' => 'Escriba el costo',
                                            'data-parsley-type' => 'integer',
                                            "data-parsley-type-message" => "Escriba un numero",]) !!}
            <span class="input-group-addon">.00</span>
          </div>
        </div>
    </div>

    <label for="" id="labelDescuento"><h4>Precio Normal: Q{{$habitacion->tarifa}}</h4></label>
    <div class="modal-footer">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
    </div>
{!! Form::close() !!}
{!! Html::script('assets/own/js/descuento.js') !!}
