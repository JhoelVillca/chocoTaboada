@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Productos</h3>
            <div class="card-tools">
                <a href="{{ route('producto.create') }}" class="btn btn-primary btn-sm">Crear Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock Min</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prods as $prod)
                        <tr>
                            <td>
                                @if ($prod->image_path)
                                    <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" width="50">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->category->name }}</td>
                            <td>{{ $prod->price }}</td>
                            <td>{{ $prod->min_stock_alert }}</td>
                            <td>
                                <a href="{{ route('producto.edit', $prod->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('producto.destroy', $prod->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection