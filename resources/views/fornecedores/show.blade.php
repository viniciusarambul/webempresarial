@extends('templates.template', [
    'title'=> 'fornecedores',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-truck',
    'active_router'=> 'fornecedores'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $fornecedor->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Fornecedor</h5>
            <p><b>Nome: </b>{{ $fornecedor->nome }}</p>
            <p><b>Sobrenome: </b>{{ $fornecedor->sobrenome }}</p>
            <p><b>E-mail: </b>{{ $fornecedor->email }}</p>
            <p><b>Telefone: </b>{{ $fornecedor->telefone }}</p>
            <p><b>CPF: </b>{{ $fornecedor->cpf }}</p>
            <p><b>CNPJ: </b>{{ $fornecedor->cnpj }}</p>
        </div>
    </div>
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados Complementares</h5>
            <p><b>Cidade: </b>{{ $fornecedor->cidade }}</p>
            <p><b>Estado: </b>{{ $fornecedor->estado }}</p>
            <p><b>Cep: </b>{{ $fornecedor->cep }}</p>
            <p><b>Bairro: </b>{{ $fornecedor->bairro }}</p>
            <p><b>Numero: </b>{{ $fornecedor->numero }}</p>
        </div>
    </div>


      <form class="col s12 m4" method="post" action="{{ route('fornecedores.destroy',['id' => $fornecedor->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('fornecedores.edit', ['id' => $fornecedor->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
