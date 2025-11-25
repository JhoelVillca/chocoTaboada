@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Categoría</h3>
        </div>
        <form action="{{ route('categoria.update', $cat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $cat->name }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ $cat->slug }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" class="form-control" id="description">{{ $cat->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="is_active">Activo</label>
                    <select name="is_active" class="form-control" id="is_active">
                        <option value="1" {{ $cat->is_active ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$cat->is_active ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection