@extends('layouts.main')
@section('teste')

    <div class="card border">
        {{-- Cabeçalho --}}
        <div class="card-header">
            {{-- Botão que fará a inserção de uma novo registro de teste --}}
            <a href="{{ route('testes.create') }}" class="btn btn-sm btn-primary" role="button">Novo Item de Teste</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Clientes de Teste</h5>
            <table class="table table-ordered table-hover">
                {{-- Cabeçalho da tabela --}}
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Preço</th>
                        <th>Votos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                {{-- Corpo da tabela --}}
                <tbody>
                    {{--
                        for($i = 0; $i < count($itens); $i++) {
                            $item = $itens[$i];
                            ...
                        }
                    --}}
                    @foreach ($itens as $elemento)
                        <tr>
                            <td>{{ $elemento->id }}</td>
                            <td>{{ $elemento->name }}</td>
                            <td>{{ $elemento->email }}</td>
                            <td>{{ $elemento->price }}</td>
                            <td>{{ $elemento->votes }}</td>
                            <td>
                                <a href="{{ route('testes.show', $elemento->id) }}" class="btn btn-sm btn-primary">Visualizar</a>
                                <a href="{{ route('testes.edit', $elemento->id) }}" class="btn btn-sm btn-success">Editar</a>
                                <a href="#" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
