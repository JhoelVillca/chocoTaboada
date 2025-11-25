@extends('public_master')

@section('content')
    <h2>Carrito de Compras</h2>
    @if(session('cart'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    @if($details['image'])
                                        <img src="{{ asset($details['image']) }}" width="50" height="50" class="img-responsive" />
                                    @endif
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td>${{ $details['price'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total ${{ $total }}</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">
                        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir Comprando</a>
                        <a href="{{ route('cart.clear') }}" class="btn btn-danger">Vaciar Carrito</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="alert alert-info">Tu carrito está vacío.</div>
        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Ir a la Tienda</a>
    @endif
@endsection