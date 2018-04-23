@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidos_compras'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $pedido_compra->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Nome: </b>{{ $pedido_compra->nome }}</p>
            <p><b>Data: </b>{{ $pedido_compra->data }}</p>
            <p><b>Fornecedor: </b>{{ $pedido_compra->fornecedor }}</p>
            <p><b>Situacao: </b>{{ $pedido_compra->situacao }}</p>
            <p><b>Produto: </b>{{ $pedido_compra->produto }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('pedidos_compras.destroy',['id' => $pedido_compra->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('pedidos_compras.edit', ['id' => $pedido_compra->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
