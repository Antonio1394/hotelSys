{!! Form::open(['route' => 'admin.cliente.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'createForm', 'data-parsley-validate' => '',]) !!}
    @include('admin.cliente.inputs')
    <div class="modal-footer">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
    </div>




{!! Form::close() !!}
{!! Html::script('assets/own/js/cliente.js') !!}
