<div class="panel panel-border panel-success" id="IdInformationReservation">
    <div class="panel-body">

        <div class="form-group">
            {!! Form::label('fecha', 'Fecha Reservación*', ['class' => 'col-sm-3 control-label']) !!}
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
            {!! Form::label('fecha', 'Fecha Reservación*', ['class' => 'col-sm-3 control-label']) !!}
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


    </div>
</div>
