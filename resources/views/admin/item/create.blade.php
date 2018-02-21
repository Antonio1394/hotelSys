{!! Form::open(['route' => 'admin.item.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'createForm', 'data-parsley-validate' => '',]) !!}
    @include('admin.item.inputs')
    <div class="modal-footer">



        {!! Form::submit('Crear', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
    </div>
{!! Form::close() !!}
{!! Html::script('assets/own/js/item.js') !!}
