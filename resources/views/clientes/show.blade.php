@extends('templates.template', [
    'title'=> 'clientes',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'clientes'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
          {{ $cliente->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Cliente</h5>
            <p><b>Nome: </b>{{ $cliente->nome }}</p>
            <p><b>Sobrenome: </b>{{ $cliente->sobrenome }}</p>
            <p><b>E-mail: </b>{{ $cliente->email }}</p>
            <p><b>Telefone: </b>{{ $cliente->telefone }}</p>

        </div>
    </div>
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados Complementares</h5>
            <p><b>Cidade: </b>{{ $cliente->cidade }}</p>
            <p><b>Estado: </b>{{ $cliente->estado }}</p>
            <p><b>Cep: </b>{{ $cliente->cep }}</p>
            <p><b>Bairro: </b>{{ $cliente->bairro }}</p>
            <p><b>Numero: </b>{{ $cliente->numero }}</p>
        </div>
    </div>


      <form class="col s12 m4" method="post" action="{{ route('clientes.destroy',['id' => $cliente->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('clientes.edit', ['id' => $cliente->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
