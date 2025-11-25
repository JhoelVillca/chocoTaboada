@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Producto</h3>
        </div>
        <form action="{{ route('producto.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    <select name="category_id" class="form-control" id="category_id" required>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del producto"
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
                    <label for="price">Precio</label>
                    <input type="number" name="price" class="form-control" id="price" step="0.01" placeholder="Precio"
                        required>
                </div>
                <div class="form-group">
                    <label for="min_stock_alert">Stock Mínimo</label>
                    <input type="number" name="min_stock_alert" class="form-control" id="min_stock_alert"
                        placeholder="Alerta de stock mínimo" required>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection