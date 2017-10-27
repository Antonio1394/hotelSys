<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

<div class="panel panel-border panel-default" id="idInformationDpi">
    <div class="panel-heading">
			<h3 class="panel-title">Información</h3>
		</div>
    <div class="panel-body">
      <div class="form-group">
          {!! Form::label('DPI', 'DPI*', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-9">
              {!! Form::number('dpi', null, ['class' => 'form-control',
                                            'id' => 'idDpi',
                                            'required' => 'required',
                                            'placeholder' => 'DPI del CLiente',
                                            'data-parsley-required-message' => 'Este campo no puede ir vacio']) !!}
          </div>
      </div>
    </div>
</div>

<div class="panel panel-border panel-success" id="IdInformation">
    <div class="panel-body">
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'col-sm-1 control-label']) !!}
        {!! Form::label('DPI', 'DPI*', ['class' => 'col-sm-6 control-label',
                                        'id'=>'idNombre']) !!}

        {!! Form::label('tel', 'Telefono:', ['class' => 'col-sm-2 control-label']) !!}
        {!! Form::label('tel', 'tel*', ['class' => 'col-sm-2 control-label',
                                        'id'=>'idTel']) !!}
      </div>

    </div>
</div>
@include('admin.habitacion.inputsCliente')
@include('admin.reservacion.inputsReservacion')
