@extends('app')

@section('content')
    <div class="card text-white bg-secondary mb-3">
        <div class="card-body pb-0">
            <div class="form-group row has-search">
                <label for="search" class="col-sm-2 offset-sm-2 col-form-label">Clientes:</label>
                <div class="col-sm-6">
                    <select name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true" title="Seleccione uno..." data-size="7">
                     
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="{{ $cliente }}">{{ $cliente->codigo." ".$cliente->referencia}}</option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card border-dark" id="info-cliente-asados" style="display: none;">
        <h5 class="card-header">Informacion del cliente</h5>
        <div class="card-body text-dark">
            <div class="form-group row">
                <label for="codigo" class="col-sm-2 col-form-label">Codigo:</label>
                <div class="col-sm-3">
                    <input type="text" readonly  class="form-control-plaintext" name="codigo" id="codigo">
                </div>
                <label for="referencia" class="col-sm-2 col-form-label">Referencia:</label>
                <div class="col-sm-3">
                    <input type="text" name="referencia" class="form-control" id="referencia">
                </div>
            </div>
            <div class="form-group row">
                <label for="monto_pagar" class="col-sm-2 col-form-label">Monto a Pagar:</label>
                <div class="col-sm-3">
                    <input type="text" name="monto_pagar" class="form-control" id="monto_pagar">
                </div>
                <label for="pagado" class="col-sm-2 col-form-label">Pagado</label>
                <div class="col-sm-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pagado" id="pago-adelantado" value="1">
                        <label class="form-check-label" for="pago-adelantado">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pagado" id="pago-no-adelantado" value="0">
                        <label class="form-check-label" for="pago-no-adelantado">No</label>
                    </div>
                </div> 
            </div>
            
                <div class="form-group row">
                    
                    <label for="hora_recepcion" class="col-sm-2 col-form-label">Hora de Recepcion:</label>
                    
                    <div class="col-sm-3">
                        <input type="text" class="form-control datetimepicker-input" id="hora_recepcion"  data-target="#hora_recepcion" data-toggle="datetimepicker" >
                    </div>
                  
                    <label for="hora_entrega" class="col-sm-2 col-form-label">Hora de Entrega</label>
                    <div class="col-sm-3">
                        <input type="text" name="hora_entrega" class="form-control datetimepicker-input" id="hora_entrega" data-target="#hora_entrega" data-toggle="datetimepicker">
                    </div>
                </div>
            
            <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Indicar que las bandejas se entregaran
                  </label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <h4>Bandejas</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-bandeja">
                        <i class="fas fa-plus"></i>
                        Agregar Bandeja
                    </button>
                </div>
            </div>
            
            <table class="table table-striped" id="tb-asados">
                <thead class="thead-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        Guardar Cambios
                    </button>
                </div>
                
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-add-bandeja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Bandeja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'asados.store','files'=>true,'id' => 'AgregarAsado' ]) !!}
                <div class="modal-body">
                    <input type="hidden" name="idCliente" id="idCliente">
                    <div class="form-group">
                        {!! Form::label('descripcion','Descripcion:') !!}
                        {!! Form::text('descripcion',null,['class'=>'form-control','placeholder' => 'Descripción de la bandeja','required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('imagen','Imagen de la bandeja:') !!}
                        {!! Form::file('imagen', array('class' => 'form-control','required' => 'required','accept'=>'.jpg, .png')) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection