<input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

<h5 class="text-custom h5">Información Cliente</h5>
<hr>
<div class="form-group">
    {!! Form::label('DPI', 'DPI*', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::number('dpi', null, ['class' => 'form-control',
                                      'id' => 'dpi',
                                      'required' => 'required',
                                      'placeholder' => 'DPI del CLiente',
                                      'data-parsley-required-message' => 'Este campo no puede ir vacio']) !!}
    </div>
</div>
