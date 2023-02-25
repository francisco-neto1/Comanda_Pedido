@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Comanda</h1>
    <form action="{{ route('comandas.update', $comanda) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome_cliente">Nome do Cliente</label>
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="{{ $comanda->nome_cliente }}" required>
        </div>
        <div class="form-group">
            <label for="numero_mesa">Número da Mesa</label>
            <input type="number" class="form-control" id="numero_mesa" name="numero_mesa" value="{{ $comanda->numero_mesa }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $comanda->status ? 'selected' : '' }}>Aberta</option>
                <option value="0" {{ !$comanda->status ? 'selected' : '' }}>Fechada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection