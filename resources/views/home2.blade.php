@extends('app')

@section('content')
    <div class="card text-white bg-secondary mb-3">
        <div class="card-body pb-0">
            <div class="form-group row has-search">
                <label for="search" class="col-sm-2 offset-sm-2 col-form-label">Codigo o Nombre:</label>
                <div class="col-sm-6">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" id="search" placeholder="Ingrese Codigo o Referencia de los asados">
                </div>
            </div>
        </div>
    </div>
    
    <div class="card" id="info-cliente-asados" style="display: none;">
        <h5 class="card-header">Informacion del cliente</h5>
        <div class="card-body">
            
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Referencia</th>
                        <th width="20%">Monto a Pagar (S/.)</th>
                        <th scope="col">Hora de entrega</th>
                        <th scope="col">Pagó?</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row" id="codigo">11012</th>
                      <td id="referencia">Mark Suckenberg</td>
                      <td><input type="text" class="form-control" name="monto" id="monto"></td>
                      <td id="hora">07: 00 pm</td>
                      <td id="pagado">SI</td>
                      <td id="accion"></td>
                    </tr>
                    
                </tbody>
            </table>

            <h5 class="text-center">Bandejas</h5>
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

        </div>
    </div>
@endsection