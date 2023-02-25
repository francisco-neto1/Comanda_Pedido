@extends('layouts.app')

@section('content')
<h1>Novo Pedido</h1>
<p></p>
            @if ($errors->any())
                <p></p>
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Houve algum problema com a entrada de dados.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<form action="{{ route('comandas.pedidos.store', $comanda) }}" method="POST">

    @csrf
    <div class="form-group">
        <label for="cliente">Cliente: {{$comanda['nome_cliente']}}</label>
    </div>
    <div class="form-group">
        <label for="descricao">Produtos:</label>
        <textarea name="descricao" id="descricao" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="quantidade">Quantidade: </label>
        <textarea name="quantidade" id="quantidade" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="valor">Valor Total:</label>
        <input type="number" name="valor" id="valor" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="entregue">Entregue?</label>
        <div class="form-check">
            <input type="checkbox" name="entregue" id="entregue" class="form-check-input">
            <label for="entregue" class="form-check-label">Sim</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection