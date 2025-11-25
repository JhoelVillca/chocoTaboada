@extends('public_master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @if($prod->image_path)
                <img class="img-fluid" src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}">
            @else
                <img class="img-fluid" src="https://via.placeholder.com/500x500" alt="Sin imagen">
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="my-3">{{ $prod->name }}</h3>
            <p>{{ $prod->description }}</p>
            <h3 class="my-3">{{ $prod->price }} Bs</h3>
            <p>Stock disponible: {{ $prod->total_stock }}</p>
            <a href="{{ route('cart.add', $prod->id) }}" class="btn btn-primary btn-lg">Añadir al Carrito</a>
            <a href="{{ url('/') }}" class="btn btn-secondary btn-lg">Volver</a>
        </div>
    </div>
@endsection