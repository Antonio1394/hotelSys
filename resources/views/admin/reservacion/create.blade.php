{!! Form::open(['route' => 'admin.reservacion.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'createForm', 'data-parsley-validate' => '',]) !!}
    @include('admin.reservacion.inputs')
    <div class="modal-footer">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-info waves-effect" id="btnBuscar">Buscar</button>
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>

    </div>
{!! Form::close() !!}

{!! Html::script('assets/own/js/reservacion.js') !!}
