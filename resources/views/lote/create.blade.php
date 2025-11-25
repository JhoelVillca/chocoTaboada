@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Lote</h3>
        </div>
        <form action="{{ route('lote.save') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select name="product_id" class="form-control" id="product_id" required>
                        @foreach ($prods as $prod)
                            <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="batch_code">Código Lote</label>
                    <input type="text" name="batch_code" class="form-control" id="batch_code" placeholder="Código del lote"
                        required>
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Cantidad" required>
                </div>
                <div class="form-group">
                    <label for="manufacturing_date">Fecha Elaboración</label>
                    <input type="date" name="manufacturing_date" class="form-control" id="manufacturing_date" required>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Fecha Vencimiento</label>
                    <input type="date" name="expiration_date" class="form-control" id="expiration_date" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('lote.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection