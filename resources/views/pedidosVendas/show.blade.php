@extends('templates.template', [
    'title'=> 'Pedido Venda',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosVendas'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $pedidoVenda->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Nome: </b>{{ $pedidoVenda->nome }}</p>
            <p><b>Data: </b>{{ $pedidoVenda->data }}</p>
            <p><b>Fornecedor: </b>{{ $pedidoVenda->cliente }}</p>
            <p><b>Situacao: </b>{{ $pedidoVenda->situacao }}</p>
            <p><b>Produto: </b>{{ $pedidoVenda->produto }}</p>
            <p><b>Quantidade: </b>{{ $pedidoVenda->quantidade }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('pedidosVendas.destroy',['id' => $pedidoVenda->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('pedidosVendas.edit', ['id' => $pedidoVenda->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
