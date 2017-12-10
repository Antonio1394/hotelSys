{!! Form::open(['url' => 'admin/inventario/storePlus', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'createForm', 'data-parsley-validate' => '',]) !!}
    <input type="hidden" name="id" value={{$id}}>
    <div class="form-group">
      {!! Form::label('cantidad', 'Cantidad*', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9">
              {!! Form::number('cantidad', null, ['class' => 'form-control',
                                            'id' => 'cantidad',
                                            'required' => 'required',
                                            'placeholder' => 'Cantidad de ingreso',
                                            'data-parsley-required-message' => 'Escriba una cantidad',
                                            'data-parsley-type' => 'integer',
                                            "data-parsley-type-message" => "Escriba un numero",]) !!}
          </div>
    </div>

    <div class="modal-footer">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
    </div>
{!! Form::close() !!}
{!! Html::script('assets/own/js/inventario.js') !!}
