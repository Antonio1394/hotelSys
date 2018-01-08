@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('habitacionMenu', 'active')

@section('styles')
<!-- {!! Html::style('assets/own/dist/sweetalert.css') !!} -->
@endsection

@section('content')
	<div class="row">
        <div class="col-lg-12">
    			<div class="panel panel-border panel-custom">
    				<div class="panel-heading" style="background:#ebeff2;">
    					<h3 class="panel-title">Listado de Habitaciones</h3>
    				</div>
						<div class="div-btn-new">
								<button class="btn btn-info waves-effect waves-light loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/inventario/create" data-title="Ingresar Producto">
										<i class="fa fa-plus m-r-5"></i>
										<span>Nuevo</span>
								</button>
						</div>
    				<div class="panel-body" style="background:#ebeff2;">
                <!--Inicio  -->
								@foreach($habitaciones as $data)
		                <div class="col-lg-4 col-sm-6">
										@if($data->estado==1)
		                  <div class="card-box" style="border-left: 10px solid lime; background-color:white;">
										@elseif($data->estado==2)
											<div class="card-box" style="border-left: 10px solid red; background-color:white;">
										@else
											<div class="card-box" style="border-left: 10px solid yellow; background-color:white;">
										@endif
		                    <div class="bar-widget">
		                      <div class="table-box">
		                        <div class="table-detail">
															<div class="iconbox bg-info">
		                           <a class="waves-effect waves-light loadModal" data-toggle="modal" data-target="#modal-maintenances" data-url="/admin/reservacion/create" data-title="Crear Reservación" ><i class=" md md-assignment"></i></a>
		                          </div>
		                        </div>
		                        <div class="table-detail">
		                           <h4 class="m-t-0 m-b-5"><b>No: {{$data->noHabitacion}}</b></h4>
		                           <p class="text-muted m-b-0 m-t-0">Nivel: {{$data->nivel}}</p>
															@if($data->estado==1)
															 <p class="text-muted m-b-0 m-t-0">Disponible</p>
															@elseif($data->estado==2)
															 <p class="text-muted m-b-0 m-t-0">Ocupada</p>
															@else
															 <p class="text-muted m-b-0 m-t-0">Mantenimento</p>
															@endif
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
								@endforeach
                <!--FIN -->
    				</div>
    			</div>
    		</div>
  </div>

	@include('templates.administrator.components.modal')
@endsection

@section('scripts')
		@include('templates.administrator.components.footer')
    <!-- {!! Html::script('assets/own/dist/sweetalert.min.js') !!} -->
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
