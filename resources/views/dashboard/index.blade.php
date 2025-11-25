@extends('master')

@section('Contenido')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalVentasMes, 2) }}<sup style="font-size: 20px">Bs</sup></h3>
                    <p>Ventas del Mes</p>
                </div>
                <div class="icon">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <a href="{{ route('pedido.index') }}" class="small-box-footer">Más info <i
                        class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $cantPedidosPendientes }}</h3>
                    <p>Pedidos Pendientes</p>
                </div>
                <div class="icon">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <a href="{{ route('pedido.index') }}" class="small-box-footer">Más info <i
                        class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $productosBajoStock }}</h3>
                    <p>Alerta Stock Bajo</p>
                </div>
                <div class="icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <a href="{{ route('producto.index') }}" class="small-box-footer">Más info <i
                        class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $lotesPorVencer }}</h3>
                    <p>Lotes por Vencer (30d)</p>
                </div>
                <div class="icon">
                    <i class="bi bi-calendar-x"></i>
                </div>
                <a href="{{ route('lote.index') }}" class="small-box-footer">Más info <i
                        class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Últimos Pedidos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ultimosPedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->user->name }}</td>
                                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ number_format($pedido->total, 2) }} Bs</td>
                                    <td>
                                        @if ($pedido->status == 'pending')
                                            <span class="badge bg-warning">Pendiente</span>
                                        @elseif($pedido->status == 'paid')
                                            <span class="badge bg-success">Pagado</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $pedido->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection