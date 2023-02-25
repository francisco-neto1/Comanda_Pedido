@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Nova Comanda</h1>
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
        <form action="{{ route('comandas.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nome_cliente">Nome do Cliente</label>
                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
            </div>
            <div class="form-group">
                <label for="numero_mesa">Número da Mesa</label>
                <input type="number" class="form-control" id="numero_mesa" name="numero_mesa" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="checkbox" class="form-control" id="status" name="status" required value="1" hidden>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
