@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categorías</h3>
            <div class="card-tools">
                <a href="{{ route('categoria.create') }}" class="btn btn-primary btn-sm">Crear Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->description }}</td>
                            <td>{{ $cat->is_active ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('categoria.destroy', $cat->id) }}" method="POST" style="display:inline;">
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