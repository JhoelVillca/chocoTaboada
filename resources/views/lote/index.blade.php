@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lotes</h3>
            <div class="card-tools">
                <a href="{{ route('lote.create') }}" class="btn btn-primary btn-sm">Crear Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Vencimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lotes as $lote)
                        <tr>
                            <td>{{ $lote->batch_code }}</td>
                            <td>{{ $lote->product->name }}</td>
                            <td>{{ $lote->quantity }}</td>
                            <td>{{ $lote->expiration_date->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('lote.edit', $lote->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('lote.destroy', $lote->id) }}" method="POST" style="display:inline;">
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