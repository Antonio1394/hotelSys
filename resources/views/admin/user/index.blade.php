@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('userMenu', 'active')

@section('styles')

@endsection

@section('content')
	<div class="row">
            <div class="col-lg-12">
    			<div class="panel panel-border panel-custom">
    				<div class="panel-heading">
    					<h3 class="panel-title">Registro de Usuarios</h3>
    				</div>
    				<div class="panel-body">
												<div class="div-btn-new">
														<button class="btn btn-info waves-effect waves-light loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/user/create" data-title="Crear Usuario">
																<i class="fa fa-plus m-r-5"></i>
																<span>Nuevo</span>
														</button>
												</div>
                        <table id="tableData" class="table table-striped table-bordered display responsive no-wrap"  width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo Usuario</th>
																		<th>Estado</th>
																		<th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->user }}</td>
                                        @if($value->tipo==1)
                                          <td>Administrador</td>
                                        @elseif($value->tipo==2)
                                            <td>Gerente</td>
                                        @else
                                            <td>Recepcionista</td>
                                        @endif
																				@if($value->estado==1)

																					<td style="color:blue;">Activo</td>
																					<td class="text-center">
																					<button class="btn btn-icon waves-effect waves-light btn-primary loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/user/{{ $value->id }}/edit" data-title="Actualizar Cliente">
																							<i class="fa fa-pencil" aria-hidden="true"></i>
																					</button>
																					<button class="btn btn-icon waves-effect waves-light btn-danger loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/user/{{ $value->id }}" data-title="Eliminar Cliente">
																							<i class="fa fa-trash-o" aria-hidden="true"></i>
																					</button>
																				@else
																				<td style="color:red;">Baja</td>
																				<td class="text-center">
																				<button class="btn btn-icon waves-effect waves-light btn-primary loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/user/{{ $value->id }}/edit" data-title="Actualizar Cliente">
																						<i class="fa fa-pencil" aria-hidden="true"></i>
																				</button>
																				@endif

                                        </td>
																		</tr>
                                @endforeach
                            </tbody>
                        </table>
    				</div>
    			</div>
    		</div>
        </div>
    </div>
	@include('templates.administrator.components.modal')
@endsection

@section('scripts')
		@include('templates.administrator.components.footer')
		{!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
		{!! Html::script('assets/plugins/datatables/dataTables.bootstrap.js') !!}
		{!! Html::script('assets/own/dist/dataTables.responsive.min.js') !!}
		{!! Html::script('assets/own/dist/responsive.bootstrap.min.js') !!}
		{!! Html::script('assets/plugins/parsleyjs/dist/parsley.min.js') !!}


		<script type="text/javascript">
				$(document).ready(function() {
						$('#tableData').DataTable( {
								language: {
										url: '/assets/own/json/spanish.json'
								}
						} );
				} );
		</script>
@endsection
