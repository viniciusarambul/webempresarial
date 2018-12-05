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
            <p><b>Situacao: </b>{{ $pedidoVenda->situacao_descricao }}</p>

        </div>
    </div>


    <div class="col s12 m4" style="margin-top:-2.4%;">
      @if($pedidoVenda->situacao == 1 || !empty($pedidoVenda->titulo))

      @else
      <p class="card-intro">
          &nbsp;
          <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosVendas.pedidoTitulo.create',['pedidoVenda' => $pedidoVenda->id]) }}">
              <i class="mdi mdi-plus"></i>
          </a>

      </p>
      @endif

        <div class="card">
          <h5>Dados do Pagamento</h5>
          @if(!empty($pedidoVenda->titulo))
              <p><b>Codigo Titulo: </b>{{ $pedidoVenda->titulo->id }}</p>
              <p><b>Data Emissão: </b>{{ date('d/m/Y', strtotime($pedidoVenda->titulo->dataEmissao)) }}</p>
              <p><b>Primeiro Vencimento: </b>{{ date('d/m/Y', strtotime($pedidoVenda->titulo->dataVencimento)) }}</p>
              <p><b>Situacao: </b>{{ $pedidoVenda->titulo->situacao }}</p>
              <p><b>Parcelas: </b>{{ $pedidoVenda->titulo->parcelas }}</p>
          @else
          <p>Não existe Dados de Pagamento do Pedido</p>
          @endif
        </div>
    </div>


    @if($pedidoVenda->situacao == 1)

    @else
      <form class="col s12 m4" method="post" action="{{ route('pedidosVendas.destroy',['id' => $pedidoVenda->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('pedidosVendas.edit', ['id' => $pedidoVenda->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>
  @endif


    <div class="col s12">
      @if($pedidoVenda->situacao == 1)

      @else
        <p class="card-intro">
            &nbsp;
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosVendas.pedidoItem.create',['pedidoVenda' => $pedidoVenda->id]) }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        @endif
        <div class="card">
          <?php $totalpedido = 0; ?>
            @if(count($pedidoVenda->itens))
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <!-- <th>Fornecedor</th> -->
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidoVenda->itens as $item)
                    <tr class="with-options">
                        <td>{{$item->produto->nome}}</td>

                        <td>{{$item->quantidade}}</td>
                        <td>{{number_format($item->valorUnitario, 2, ',', '.')}}</td>
                        <td>{{number_format($item->preco, 2, ',', '.')}}</td>
                        <td >
                            <a href="{{ route('pedidosVendas.show', ['$pedidoVenda' => $pedidoVenda->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    <?php $totaltudo = $totalpedido+=$item->preco;?>
                    @endforeach

                    <tr>
                      <td colspan="3" style="text-align: right">Total</td>
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
