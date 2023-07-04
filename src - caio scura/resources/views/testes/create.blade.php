@extends('layouts.main')
@section('teste')

    <div class="card border">
        <div class="card-body">
            {{-- Cria um formulário para a inserção --}}
            <form action="{{ route('testes.store') }}" method="POST">
                {{-- Insere o token de verificação no formulário --}}
                @csrf
                {{-- Campos do Cliente de Teste --}}
                <div class="form-group">
                    {{-- Nome --}}
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome" class="form-control">
                    {{-- e-mail --}}
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="email@email.com" class="form-control">
                    {{-- Preço --}}
                    <label for="price">Preço</label>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input type="number" min="0" step="0.01" data-number-tofixed="2" data-number-stepfactor="100" class="form-control currency" id="price" name="price" placeholder="Preço">
                    </div>
                    {{-- Votos --}}
                    <label for="votes">Quantidade de Votos</label>
                    <input type="text" name="votes" id="votes" placeholder="Quantidade de Votos" class="form-control">
                </div>
                {{-- Botão que fará a submissão do formulário --}}
                <button input="submit" class="btn btn-primary btn-sm">Salvar</button>
                {{-- Botão que cancelará a inclusão de um novo registro e retornará para a página de listagem --}}
                <a href="{{ route('testes.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
