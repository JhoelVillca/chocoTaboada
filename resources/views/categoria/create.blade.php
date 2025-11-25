@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Categoría</h3>
        </div>
        <form action="{{ route('categoria.save') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de la categoría"
                        required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Descripción"></textarea>
                </div>
                <div class="form-group">
                    <label for="is_active">Activo</label>
                    <select name="is_active" class="form-control" id="is_active">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
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