@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Comanda</h1>
        <div class="row">
            <div class="col-sm-6">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <td>{{ $comanda->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome do Cliente</th>
                        <td>{{ $comanda->nome_cliente }}</td>
                    </tr>
                    <tr>
                        <th>Número da Mesa</th>
                        <td>{{ $comanda->numero_mesa }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $comanda->status ? 'Aberta' : 'Fechada' }}</td>
                    </tr>
                </table>
                <a href="{{ route('comandas.edit', $comanda) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('comandas.destroy', $comanda) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
            <div class="col-sm-6">
                <h2>Pedidos</h2>
                <a href="{{ route('comandas.pedidos.create', $comanda) }}" class="btn btn-primary mb-3">Novo Pedido</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comanda->pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->descricao }}</td>
                                <td>{{ $pedido->quantidade }}</td>
                                <td>{{ $pedido->valor }}</td>
                                <td>
                                    <a href="{{ route('comandas.pedidos.edit', [$comanda, $pedido]) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('comandas.pedidos.destroy', [$comanda, $pedido]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection