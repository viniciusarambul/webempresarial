@extends('templates.template', [
    'title'=> 'produtos',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folderk',
    'active_router'=> 'produtos'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $produto->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Produto</h5>
            <p><b>Nome: </b>{{ $produto->nome }}</p>
            <p><b>Descricao: </b>{{ $produto->descricao }}</p>
            <p><b>Valor Unitário: </b>{{ $produto->valorUnitario }}</p>
            <p><b>Quantidade: </b>{{ $produto->quantidade }}</p>
            <p><b>Fornecedor: </b>{{ $produto->fornecedorNome }}</p>
        </div>
    </div>

      <form class="col s12 m4" method="post" action="{{ route('produtos.destroy',['id' => $produto->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('produtos.edit', ['id' => $produto->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
