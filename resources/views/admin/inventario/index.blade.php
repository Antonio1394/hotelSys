@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('inventarioMenu', 'active')
@section('styles')
{!! Html::style('assets/own/dist/sweetalert.css') !!}
@endsection

@section('content')
	<div class="row">
            <div class="col-lg-12">
    			<div class="panel panel-border panel-custom">
    				<div class="panel-heading">
    					<h3 class="panel-title">Inventario de Productos</h3>
    				</div>
    				<div class="panel-body">
												<div class="div-btn-new">
														<button class="btn btn-info waves-effect waves-light loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/inventario/create" data-title="Ingresar Producto">
																<i class="fa fa-plus m-r-5"></i>
																<span>Nuevo</span>
														</button>
												</div>
                        <table id="tableData" class="table table-striped table-bordered display responsive no-wrap"  width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Producto</th>
                                    <th>Marca</th>
                                    <th>Cantidad</th>
																		<th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventario as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->producto }}</td>
                                        <td>{{ $value->marca }}</td>
                                        <td>{{ $value->cantidad }}</td>
                                        <td class="text-center">
																				<button class="btn btn-icon waves-effect waves-light btn-primary loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/inventario/{{ $value->id }}/edit" data-title="Actualizar Item">
																						<i class="fa fa-pencil" aria-hidden="true"></i>
																				</button>
																				<button class="btn btn-icon waves-effect waves-light btn-inverse loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/inventario/showPlus/{{ $value->id }}" data-title="Actualizar Item">
																						<i class="ion-plus" aria-hidden="true"></i>
																				</button>
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
    {!! Html::script('assets/own/dist/sweetalert.min.js') !!}
    {!! Html::script('assets/plugins/moment/moment.js') !!}
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
