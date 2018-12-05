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
            Pedido Compras
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('pedidosCompras.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Pedido (digite a Descrição)" value="{{$filter}}">
    </div>
    <div class="input col m6">
        <button type="submit" class="btn blue">
            <i class="mdi mdi-magnify"></i>
        </button>
    </div>
</form>

<div class="row">
    <div class="col s12">
        <p class="card-intro">
            &nbsp;
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosCompras.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($pedidosCompras))
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Data Pedido</th>
                        <th>Situação</th>
                        <th>Valor Compra</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidosCompras as $pedidoCompra)
                    <tr class="with-options">
                        <td>{{$pedidoCompra->id}}</td>
                        <td>{{$pedidoCompra->nome}}</td>
                        <td>{{date("d/m/Y", strtotime($pedidoCompra->data))}}</td>
                        <td>{{$pedidoCompra->situacao_descricao}}</td>
                        <td>{{number_format($pedidoCompra->titulo->preco,2,',','.')}}</td>
                        <td style="width: 30%">
                          @if($pedidoCompra->situacao == 1)
                          <a class="waves-effect waves-light btn black" href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}">
                              <span style="font-size: 14px; color: white">Ver</span>
                          </a>
                          @else
                            <a  class="waves-effect waves-light btn" href="{{ route('pedidosCompras.edit', ['$pedidoCompra' => $pedidoCompra->id]) }}">
                                <span style="font-size: 14px;color: white">Editar</span>
                            </a>
                            <a class="waves-effect waves-light btn black" href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há Pedidos Compra.</p>
            @endif
        </div>
        {{ $pedidosCompras->appends(['filter'=>$filter])->links() }}
    </div>
</div>



@endsection
