@extends('layouts.main')
@section('teste')

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        {{-- Cabeçalho --}}
        <h6 class="border-bottom border-gray pb-2 mb-0">{{ $elemento->id }} - {{ $elemento->name }}</h6>
        {{-- Primeiro Bloco de Informações - e-mail --}}
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">E-mail</strong>
                {{ $elemento->email }}
            </p>
        </div>
        {{-- Segundo Bloco de Informações - Preço --}}
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Preço</strong>
                R$ {{ $elemento->price }}
            </p>
        </div>
        {{-- Terceiro Bloco de Informações - Votos --}}
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Votos</strong>
                {{ $elemento->votes }} votos
            </p>
        </div>
        {{-- Quarto Bloco de Informações - Criado em --}}
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Data de Criação</strong>
                {{ date('d/m/Y H:i', strtotime($elemento->created_at)) }}
            </p>
        </div>
        {{-- Quinto Bloco de Informações - Atualizado em --}}
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-graydark">Data da última atualização</strong>
                {{ date('d/m/Y H:i', strtotime($elemento->updated_at)) }}
            </p>
        </div>
        <small class="d-block text-right mt-3">
            <a href="{{ route('testes.edit', $elemento->id) }}" class="btn btn-small btn-success">Editar</a>
            <a href="{{ route('testes.index') }}" class="btn btn-small btn-primary">Voltar</a>
        </small>
    </div>
@endsection
