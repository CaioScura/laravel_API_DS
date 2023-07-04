@extends('layouts.main')

@section('teste')

<div class="row">

    <div class="col-sm-4 upper-card">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cadastro de Produtos</h5>
          <p class="card-text">
            Aqui você cadastra todos os seus produtos.
            Só não se esqueça de salvar previamente as categorias.
          </p>
          <a href="#" class="btn btn-primary">Cadastro de Produtos</a>
        </div>
      </div>
    </div>

    <div class="col-sm-4 upper-card">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cadastro de Categorias</h5>
          <p class="card-text">
            Aqui você cadastra as suas categorias
            </p>
          <a href="#" class="btn btn-primary">Cadastro de Categorias</a>
        </div>
      </div>
    </div>

  <div class="col-sm-4 upper-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastro de Clientes</h5>
        <p class="card-text">
            Aqui você cadastra os seus Clientes
        </p>
        <a href="#" class="btn btn-primary">Cadastro de Clientes</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4 upper-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastro de Testes</h5>
        <p class="card-text">
          Aqui você cadastra todos os seus Testes
        </p>
        <a href="{{ route('testes.index')}}" class="btn btn-primary">Cadastro de Testes</a>
      </div>
    </div>
  </div>

</div>

@endsection
