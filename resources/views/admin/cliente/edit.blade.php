{!! Form::model($dataEdit, ['route' => ['admin.cliente.update', $dataEdit->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'editForm', 'data-parsley-validate' => '', 'files' => true]) !!}
    <input type="hidden" name="id" id="id" value="{{ $dataEdit->id }}">
    @include('admin.cliente.inputs')
    <div class="modal-footer">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
    </div>
{!! Form::close() !!}

{!! Html::script('assets/own/js/cliente.js') !!}
