@extends('app')

@section('content')
	{!! Form::open(['route' => 'clientes.store','files'=>true]) !!}
	<div class="row">
		
		<div class="col-md-4">
			<h3 class="text-center">Información cliente</h3>
			
			    <div class="form-group">
			    	{!! Form::label('codigo','Codigo:') !!}
			    	{!! Form::text('codigo',null,['class'=>'form-control','placeholder' => 'Codigo del cliente','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('referencia','Referencia:') !!}
			    	{!! Form::text('referencia',null,['class'=>'form-control','placeholder' => 'Referencia del cliente - Ejm: Nombre','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('monto_pagar','Monto a Pagar:') !!}
			    	{!! Form::text('monto_pagar',null,['class'=>'form-control','placeholder' => 'Monto a pagar por las bandejas','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('hora_entrega','Hora Entraga:') !!}
			    	{!! Form::text('hora_entrega',null,['class'=>'form-control','placeholder' => 'Hora de entrega de las bandejas','required' => 'required', 'data-target' => '#hora_entrega', 'data-toggle' => "datetimepicker"]) !!}

			    </div>
			    <div class="form-group">
			    	{!! Form::label('pagado','Pago?') !!} <br>	

			    	<div class="form-check form-check-inline">
					  	{!! Form::radio('pagado', '0', true, ['class' => 'form-check-input', 'id'=>'inlineRadio1']); !!} 
					  	<label class="form-check-label" for="inlineRadio1">No</label>
					</div>
			    	<div class="form-check form-check-inline">
					  	{!! Form::radio('pagado', '1',false, ['class' => 'form-check-input', 'id'=>'inlineRadio2']); !!} 
					  	<label class="form-check-label" for="inlineRadio2">Si</label>
					</div>
			    </div>
			    <div class="form-group">
			    	<input type="file" capture="camera" accept="image/*" id="cameraInput" name="cameraInput">
			    </div>
			
		</div>
		<div class="col-md-8">
			<h3>Informacion de la bandeja</h3>
			<table class="table table-striped" id="tb-bandejas">
				<thead class="thead-dark">
					<tr>
						<th>Descripcion</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							{!! Form::text('bandejas[]',null,['class'=>'form-control','placeholder' => 'Descripción de la bandeja','required' => 'required']) !!}

							{!! Form::file('image[]', array('class' => 'form-control', 'accept' => '.jpg,.png')) !!}
						</td>
						<td>
							{!! Form::button('Agregar',['class'=>'btn btn-success btn-agregar']) !!}
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
			{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
@endsection