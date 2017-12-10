@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('dashboardMenu', 'active')

@section('styles')
	{!! Html::style('assets/own/dist/sweetalert.css') !!}

@endsection
@section('content')
	<div class="main-body" v-show="!chatview">
		<div class="row show-chat">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h4 class="page-title text-center">Bienvenidos Hotel Carmiña Isabel</h4>
				<p class="text-center">Datos generales del sistema.</p>
			</div>
		</div>
    	<div class="row">
			<div class="col-sm-12">
				<div class="card-box widget-inline">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="widget-inline-box text-center">
								<h3><i class="text-danger md md-restore "></i> <b>{{$ocu}}</b></h3>
								<h4 class="text-muted">Habitaciones Ocupadas</h4>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="widget-inline-box text-center">
								<h3><i class="text-success fa fa-bell"></i> <b>{{$dis}}</b></h3>
								<h4 class="text-muted">Habitaciones Disponibles</h4>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="widget-inline-box text-center">
								<h3><i class="text-warning md md-warning"></i> <b>{{$man}}</b></h3>
								<h4 class="text-muted">Habitaciones en Mantenimiento</h4>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="widget-inline-box text-center b-0">
								<h3><i class="text-purple fa fa-bed"></i> <b>30</b></h3>
								<h4 class="text-muted">Huespedes</h4>
							</div>
						</div>

					</div>
				</div>
			</div>
    	</div>
	</div>


	<div class="portlet">
		<div class="portlet-heading">
			<h3 class="portlet-title text-dark text-uppercase">Datos de Inventario</h3>
		</div>
		<div class="clearfix"></div>
		<div class="panel-collapse collapse in">
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Producto</th>
								<th>Marca</th>
								<th>Existencia</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							@foreach($inventario as $key=> $value)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$value->producto}}</td>
									<td>{{$value->marca}}</td>
									<td>{{$value->cantidad}}</td>
									@if($value->cantidad>80)
										<td><span class="label label-success">Alto</span></td>
									@elseif($value->cantidad <= 50 && $value->cantidad >=25 )
										<td><span class="label label-warning">Regular</span></td>
									@else
										<td><span class="label label-danger">Bajo</span></td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	@include('templates.administrator.components.footer')

	{!! Html::script('assets/own/dist/sweetalert.min.js') !!}
	{!! Html::script('assets/plugins/moment/moment.js') !!}
  {!! Html::script('assets/pages/jquery.chat.admin.js') !!}
	{!! Html::script('assets/own/js/vue.js') !!}
	{!! Html::script('assets/own/js/vue-resource.js') !!}
@endsection
