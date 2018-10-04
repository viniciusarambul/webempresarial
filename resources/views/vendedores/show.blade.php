@extends('templates.template', [
    'title'=> 'vendedores',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'vendedores'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
          {{ $vendedor->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Vendedor</h5>
            <p><b>Nome: </b>{{ $vendedor->nome }}</p>
            <p><b>Sobrenome: </b>{{ $vendedor->sobrenome }}</p>
            <p><b>E-mail: </b>{{ $vendedor->email }}</p>
            <p><b>Telefone: </b>{{ $vendedor->telefone }}</p>
            <p><b>Status: </b>{{ $vendedor->status }}</p>

        </div>
    </div>
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados Complementares</h5>
            <p><b>Cidade: </b>{{ $vendedor->cidade }}</p>
            <p><b>Estado: </b>{{ $vendedor->estado }}</p>
            <p><b>Cep: </b>{{ $vendedor->cep }}</p>
            <p><b>Bairro: </b>{{ $vendedor->bairro }}</p>
            <p><b>Numero: </b>{{ $vendedor->numero }}</p>
        </div>
    </div>


      <form class="col s12 m4" method="post" action="{{ route('vendedores.destroy',['id' => $vendedor->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('vendedores.edit', ['id' => $vendedor->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
