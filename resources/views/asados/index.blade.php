@extends('app')

@section('content')
	@php($estados = ['Espera','Cocción','Por entregar','Entregado'])
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Informacion de los asados</h1>
			<table class="table table-striped" id="tb-search">
				<thead class="thead-dark">
					<tr>
						<th>Imagen</th>
						<th>Descripcion</th>
						
						<th>Codigo</th>
						<th>Referencia</th>
						<th>Hora de Entrega</th>
						<th>Estado</th>
						<th>Cambio de Estado</th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($asados))
						@foreach($asados as $asado)
							<tr>
								<td>
									<img src='{{ asset("/images/$asado->imagen") }}' alt="{{ $asado->descripcion}}" class="img-fluid" width="150px">
								</td>
								<td>{{ $asado->descripcion}}</td>
								<td>{{ $asado->cliente->codigo}}</td>
								<td>{{ $asado->cliente->referencia}}</td>
								<td>{{ $asado->cliente->hora_entrega}}</td>
								<td>{{ $estados[$asado->estado]}}</td>
								<td>
									@switch($asado->estado)
									    @case(0)
									        <button type="button" class="btn btn-warning btn-change-status" value="{{ $asado->id."*".($asado->estado +1) }}"> Pasar a Cocción</button>
									        @break

									    @case(1)
									        <button type="button" class="btn btn-primary btn-change-status" value="{{ $asado->id."*".($asado->estado +1)}}"> Pasar a Por entregar</button>
									        @break
									    @case(2)
									        <button type="button" class="btn btn-success btn-change-status" value="{{ $asado->id."*".($asado->estado +1)}}"> Pasar a Entregado</button>
									        @break

									    @default
									        <span>No hay mas opciones</span>
									@endswitch
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

	@include('asados.modal')
	
@endsection