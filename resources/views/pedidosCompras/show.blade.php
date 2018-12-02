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
            <p><b>Data: </b>{{ date('d/m/Y', strtotime($pedidoCompra->data)) }}</p>
            <p><b>Situacao: </b>{{ $pedidoCompra->situacao_descricao }}</p>

        </div>
    </div>


    <div class="col s12 m4" style="margin-top:-2.4%;">
      <p class="card-intro">
          &nbsp;
          <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosCompras.pedidoTitulo.create',['pedidoCompra' => $pedidoCompra->id]) }}">
              <i class="mdi mdi-plus"></i>
          </a>
      </p>
        <div class="card">
            <h5>Dados do Pagamento</h5>
            <p><b>Nome: </b>{{ $pedidoCompra->nome }}</p>
            <p><b>Data: </b>{{ date('d/m/Y', strtotime($pedidoCompra->data)) }}</p>
            <p><b>Situacao: </b>{{ $pedidoCompra->situacao }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('pedidosCompras.destroy',['id' => $pedidoCompra->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('pedidosCompras.edit', ['id' => $pedidoCompra->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


    <div class="col s12">
        <p class="card-intro">
            &nbsp;
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosCompras.pedidoItem.create',['pedidoCompra' => $pedidoCompra->id]) }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
          <?php $totalpedido = 0; ?>
            @if(count($pedidoCompra->itens))
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Fornecedor</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidoCompra->itens as $item)

                    <tr class="with-options">
                        <td>{{$item->produto->nome}}</td>
                        <td>{{$item->fornecedor->nome}}</td>
                        <td>{{$item->quantidade}}</td>
                        <td>{{number_format($item->valorUnitario, 2, ',', '.')}}</td>
                        <td>{{number_format($item->preco, 2, ',', '.')}}</td>
                        <td class="options">
                            <a href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                        </td>

                    </tr>
                    <?php $totaltudo = $totalpedido+=$item->preco;?>
                    @endforeach

                    <tr>
                      <td colspan="4" style="text-align: right">Total</td>
                      <td colspan="1">{{number_format($totaltudo, 2, ',', '.')}}</td>
                    </tr>

                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há produtos.</p>
            @endif
        </div>
    </div>

  </div>


@endsection
