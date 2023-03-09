@extends('layouts.app')

@section('content')
    <h1>Editar Pedido {{ $pedido->id }}</h1>
    <form action="{{ route('comandas.pedidos.update', [$comanda, $pedido]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="{{ $pedido->cliente }}" required>
        </div>
        <div class="form-group">
            <label for="produtos">Produtos:</label>
            <textarea name="produtos" id="produtos" class="form-control" required>{{ $pedido->produtos }}</textarea>
        </div>
        <div class="form-group">
            <label for="valor_total">Valor Total:</label>
            <input type="number" name="valor_total" id="valor_total" class="form-control" step="0.01" value="{{ $pedido->valor_total }}" required>
        </div>
        <div class="form-group">
            <label for="entregue">Entregue?</label>
            <div class="form-check">
                <input type="checkbox" name="entregue" id="entregue" class="form-check-input" {{ $pedido->entregue ? 'checked' : '' }}>
                <label for="entregue" class="form-check-label">Sim</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection