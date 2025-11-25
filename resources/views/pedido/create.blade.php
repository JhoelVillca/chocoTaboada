@extends('master')

@section('Contenido')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo Pedido</h3>
        </div>
        <form action="{{ route('pedido.save') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="user_id">Cliente</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Productos</label>
                    <table class="table table-bordered" id="tabla-productos">
                        <thead>
                            <tr>
                                <th>Producto - Lote - Stock</th>
                                <th>Cantidad</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="lote_id[]" class="form-control" required>
                                        @foreach ($lotes as $lote)
                                            <option value="{{ $lote->id }}">
                                                {{ $lote->product->name }} - {{ $lote->batch_code }} - (Stock:
                                                {{ $lote->quantity }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" class="form-control" min="1" value="1" required>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success btn-sm" id="add-row">Agregar Producto (+)</button>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function () {
            var table = document.getElementById('tabla-productos').getElementsByTagName('tbody')[0];
            var newRow = table.rows[0].cloneNode(true);
            newRow.querySelector('input').value = 1;
            table.appendChild(newRow);
        });

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                var row = e.target.closest('tr');
                if (document.querySelectorAll('#tabla-productos tbody tr').length > 1) {
                    row.remove();
                } else {
                    alert('Debe haber al menos un producto.');
                }
            }
        });
    </script>
@endsection