@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Lote</h3>
        </div>
        <form action="{{ route('lote.update', $lote->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select name="product_id" class="form-control" id="product_id" required>
                        @foreach ($prods as $prod)
                            <option value="{{ $prod->id }}" {{ $lote->product_id == $prod->id ? 'selected' : '' }}>
                                {{ $prod->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="batch_code">Código Lote</label>
                    <input type="text" name="batch_code" class="form-control" id="batch_code"
                        value="{{ $lote->batch_code }}" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $lote->quantity }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="manufacturing_date">Fecha Elaboración</label>
                    <input type="date" name="manufacturing_date" class="form-control" id="manufacturing_date"
                        value="{{ $lote->manufacturing_date->format('Y-m-d') }}" required>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Fecha Vencimiento</label>
                    <input type="date" name="expiration_date" class="form-control" id="expiration_date"
                        value="{{ $lote->expiration_date->format('Y-m-d') }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('lote.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection