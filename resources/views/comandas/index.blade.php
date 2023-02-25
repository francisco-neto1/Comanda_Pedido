@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comandas</h1>
        <a href="{{ route('comandas.create') }}" class="btn btn-primary mb-3">Nova Comanda</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do Cliente</th>
                    <th>Número da Mesa</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comandas as $comanda)
                    <tr>
                        <td>{{ $comanda->id }}</td>
                        <td>{{ $comanda->nome_cliente }}</td>
                        <td>{{ $comanda->numero_mesa }}</td>
                        <td>{{ $comanda->status ? 'Aberta' : 'Fechada' }}</td>
                        <td>
                            <a href="{{ route('comandas.show', $comanda) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('comandas.edit', $comanda) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('comandas.destroy', $comanda) }}" method="post" class="d-inline">
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
@endsection
