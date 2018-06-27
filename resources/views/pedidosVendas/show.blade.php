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
            <p><b>Situacao: </b>{{ $pedidoVenda->situacao }}</p>

        </div>
    </div>


    <div class="col s12 m4" style="margin-top:-2.4%;">
      <p class="card-intro">
          &nbsp;
          <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosVendas.pedidoTitulo.create',['pedidoVenda' => $pedidoVenda->id]) }}">
              <i class="mdi mdi-plus"></i>
          </a>
      </p>
        <div class="card">
            <h5>Dados do Pagamento</h5>
            <p><b>Nome: </b>{{ $pedidoVenda->nome }}</p>
            <p><b>Data: </b>{{ $pedidoVenda->data }}</p>
            <p><b>Situacao: </b>{{ $pedidoVenda->situacao }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('pedidosVendas.destroy',['id' => $pedidoVenda->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('pedidosVendas.edit', ['id' => $pedidoVenda->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


    <div class="col s12">
        <p class="card-intro">
            &nbsp;
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosVendas.pedidoItem.create',['pedidoVenda' => $pedidoVenda->id]) }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($pedidoVenda->itens))
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Fornecedor</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Total</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidoVenda->itens as $item)
                    <tr class="with-options">
                        <td>{{$item->produto->nome}}</td>
                        <td>{{$item->fornecedor->nome}}</td>
                        <td>{{$item->quantidade}}</td>
                        <td>{{$item->preco}}</td>
                        <td>{{$item->total}}</td>
                        <td class="options">
                            <a href="{{ route('pedidosVendas.show', ['$pedidoVenda' => $pedidoVenda->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há produtos.</p>
            @endif
        </div>
    </div>

  </div>


@endsection
