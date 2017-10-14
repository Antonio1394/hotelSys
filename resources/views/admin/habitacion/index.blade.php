@extends('admin.layouts.principal')
@section('title', 'Administrador')
@section('habitacionMenu', 'active')

@section('styles')
{!! Html::style('assets/own/dist/sweetalert.css') !!}
@endsection

@section('content')
	<div class="row">
        <div class="col-lg-12">
    			<div class="panel panel-border panel-custom">
    				<div class="panel-heading" style="background:#ebeff2;">
    					<h3 class="panel-title">Listado de Habitaciones</h3>
    				</div>
    				<div class="panel-body" style="background:#ebeff2;">
                <!--Inicio  -->
								@foreach($habitaciones as $data)
		                <div class="col-lg-4 col-sm-6">
										@if($data->estado==1)
		                  <div class="card-box" style="border-left: 6px solid lime; background-color:white;">
										@elseif($data->estado==2)
											<div class="card-box" style="border-left: 6px solid red; background-color:white;">
										@else
											<div class="card-box" style="border-left: 6px solid yellow; background-color:white;">
										@endif
		                    <div class="bar-widget">
		                      <div class="table-box">
		                        <div class="table-detail">
														@if($data->estado==1)
		                          <div class="iconbox bg-success">
		                            <i class="ion-ios7-bell-outline"></i>
		                          </div>
														@elseif($data->estado==2)
															<div class="iconbox bg-danger">
																<i class="md-control-point-duplicate"></i>
															</div>
														@else
															<div class="iconbox bg-warning">
																<i class="md-report-problem"></i>
															</div>
														@endif
															<div class="iconbox bg-purple">
		                            <i class="icon-layers"></i>
		                          </div>
		                        </div>
		                        <div class="table-detail">
		                           <h4 class="m-t-0 m-b-5"><b>No: {{$data->noHabitacion}}</b></h4>
		                           <p class="text-muted m-b-0 m-t-0">Nivel: {{$data->nivel}}</p>
															@if($data->estado==1)
															 <p class="text-muted m-b-0 m-t-0">Estado:Disponible</p>
															@elseif($data->estado==2)
															 <p class="text-muted m-b-0 m-t-0">Estado:Ocupada</p>
															@else
															 <p class="text-muted m-b-0 m-t-0">Estado:</p>
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
