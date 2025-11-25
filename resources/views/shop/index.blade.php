@extends('public_master')

@section('content')
    <div class="row">
        @foreach($prods as $prod)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    @if($prod->image_path)
                        <img class="card-img-top" src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}"
                            style="height: 200px; object-fit: cover;">
                    @else
                        <img class="card-img-top" src="https://via.placeholder.com/200x200" alt="Sin imagen"
                            style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('shop.show', $prod->slug) }}">{{ $prod->name }}</a>
                        </h4>
                        <h5>${{ $prod->price }}</h5>
                        <p class="card-text">{{ Str::limit($prod->description, 50) }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Stock: {{ $prod->total_stock }}</small>
                        <a href="{{ route('cart.add', $prod->id) }}" class="btn btn-primary btn-sm float-right">Añadir al
                            Carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection