@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Informacion de los clientes</h1>
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th>Codigo</th>
						<th>Referencia</th>
						<th>Bandejas</th>
						<th>Total a Pagar</th>
						<th>Hora de Entrega</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($clientes))
						@foreach($clientes as $cliente)
							<tr>
								<td>{{ $cliente->codigo}}</td>
								<td>{{ $cliente->referencia}}</td>
								<td>{{ $cliente->cantidad_asados}}</td>
								<td>{{ $cliente->monto_pagar}}</td>
								<td>{{ $cliente->hora_entrega}}</td>
								<td>
									<button type="button" class="btn btn-info btn-ver" value="{{ $cliente }}" data-toggle="modal" data-target="#exampleModal">
										Ver
									</button>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
	@include('clientes.modal')
	
@endsection