@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosCompras'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $pedidoCompra->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Nome: </b>{{ $pedidoCompra->nome }}</p>
            <p><b>Data: </b>{{ $pedidoCompra->data }}</p>
            <p><b>Fornecedor: </b>{{ $pedidoCompra->fornecedor }}</p>
            <p><b>Situacao: </b>{{ $pedidoCompra->situacao }}</p>
            <p><b>Produto: </b>{{ $pedidoCompra->produto }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('pedidosCompras.destroy',['id' => $pedidoCompra->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('pedidosCompras.edit', ['id' => $pedidoCompra->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
