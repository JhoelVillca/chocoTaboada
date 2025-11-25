@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalle del Pedido #{{ $pedido->id }}</h3>
            <div class="card-tools">
                <a href="{{ route('pedido.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                <button onclick="window.print()" class="btn btn-default btn-sm"><i class="fas fa-print"></i>
                    Imprimir</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> ChocoTaboada
                        <small class="float-right">Fecha: {{ $pedido->created_at->format('d/m/Y') }}</small>
                    </h4>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Cliente
                    <address>
@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalle del Pedido #{{ $pedido->id }}</h3>
            <div class="card-tools">
                <a href="{{ route('pedido.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                <button onclick="window.print()" class="btn btn-default btn-sm"><i class="fas fa-print"></i>
                    Imprimir</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> ChocoTaboada
                        <small class="float-right">Fecha: {{ $pedido->created_at->format('d/m/Y') }}</small>
                    </h4>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Cliente
                    <address>
                        <strong>{{ $pedido->user->name }}</strong><br>
                        {{ $pedido->user->email }}<br>
                        {{ $pedido->user->phone ?? 'Sin teléfono' }}
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Lote</th>
                                <th>Cant.</th>
                                <th>Precio Unit.</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->batch->batch_code }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }} Bs</td>
                                    <td>{{ $item->quantity * $item->price }} Bs</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total:</th>
                                <td>{{ $pedido->total }} Bs</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
@endsection