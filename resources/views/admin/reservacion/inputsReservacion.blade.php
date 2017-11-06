<div class="panel panel-border panel-success" id="IdInformationReservation">
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('fecha', 'Fecha*', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                <div class="input-daterange input-group" id="date-range">
              {!! Form::date('fechaI', null, ['class' => 'form-control',
                                              'id' => 'idDpi',
                                              'required' => 'required',
                                              'data-parsley-required-message' => 'Este campo no puede ir vacio']) !!}
                <span class="input-group-addon bg-custom b-0 text-white">a</span>
                {!! Form::date('fechaI', null, ['class' => 'form-control',
                                                'id' => 'idDpi',
                                                'required' => 'required',
                                                'data-parsley-required-message' => 'Este campo no puede ir vacio']) !!}
                  </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('horaI', 'Hora Ingreso*', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                <div class="input-daterange input-group" id="date-range">
                  {!! Form::number('horaI', null, ['class' => 'form-control',
                                                'id' => 'idDpi',
                                                'required' => 'required',
                                                'placeholder' => 'Hora, formato: 0-24',
                                                'data-parsley-required-message' => 'Este campo no puede ir vacio',
                                                'max'=>24,
                                                'min'=>00,
                                                'data-parsley-min'=>00,
                                                'data-parsley-min-message'=>'No Existe esta Hora',
                                                'data-parsley-max'=>24,
                                                'data-parsley-max-message'=>'No Existe esta Hora']) !!}
                <span class="input-group-addon bg-custom b-0 text-white">:</span>
                {!! Form::number('minI', null, ['class' => 'form-control',
                                                'id' => 'idDpi',
                                                'required' => 'required',
                                                'placeholder' => 'Minutos',
                                                'data-parsley-required-message' => 'Este campo no puede ir vacio',
                                                'max'=>60,
                                                'min'=>00,
                                                'data-parsley-min'=>00,
                                                'data-parsley-min-message'=>'Los minutos no son correctos',
                                                'data-parsley-max'=>60,
                                                'data-parsley-max-message'=>'Los minutos no son correctos']) !!}
                  </div>
            </div>
        </div>

        <div class="form-group">
              {!! Form::label('tipoVehiculo', 'Tipo Vehiculo*', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
              {!! Form::select('tipoVehiculo',$tipo, null, ['class' => 'form-control',
                                                            'placeholder' => 'Tipo Vehiculo del CLiente']) !!}
          </div>
        </div>

        <div class="form-group">
            {!! Form::label('placa', 'Placa*', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::text('placa', null, ['class' => 'form-control',
                                           'placeholder' => 'Placa Ej.: 887VMK']) !!}
              </div>
        </div>

        <div class="form-group">
            {!! Form::label('color', 'Color*', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::text('color', null, ['class' => 'form-control',
                                           'placeholder' => 'Color Vehiculo Ej.: Amarillo']) !!}
              </div>
        </div>

        <div class="form-group">
              {!! Form::label('image', 'Imagen*', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
            {!! Form::file('boleta', ["class" => "filestyle",
                                      "data-size" => "sm",
                                      "id" => "image",
                                      "tabindex" => "-1",]) !!}

          </div>
      </div>


    </div>
</div>
