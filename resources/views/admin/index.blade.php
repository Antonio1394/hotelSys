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
								<h3><i class="text-primary fa  fa-warning "></i> <b>4</b></h3>
								<h4 class="text-muted">Habitaciones Ocupadas</h4>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="widget-inline-box text-center">
								<h3><i class="text-custom md md-account-child"></i> <b>5</b></h3>
								<h4 class="text-muted">Habitaciones Disponibles</h4>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="widget-inline-box text-center">
								<h3><i class="text-pink fa fa-ambulance"></i> <b>0</b></h3>
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

@endsection

@section('scripts')
	@include('templates.administrator.components.footer')

	{!! Html::script('assets/own/dist/sweetalert.min.js') !!}
	{!! Html::script('assets/plugins/moment/moment.js') !!}
  {!! Html::script('assets/pages/jquery.chat.admin.js') !!}
	{!! Html::script('assets/own/js/vue.js') !!}
	{!! Html::script('assets/own/js/vue-resource.js') !!}
@endsection
