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
            Pedido Vendas
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('pedidosVendas.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Pedido (digite o Nome)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('pedidosVendas.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($pedidosVendas))
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Situação</th>
                        <th>Valor Venda</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidosVendas as $pedidoVenda)
                    <tr class="with-options">
                        <td>{{$pedidoVenda->id}}</td>
                        <td>{{$pedidoVenda->nome}}</td>
                        <td>{{date("d/m/Y", strtotime($pedidoVenda->data))}}</td>
                        <td>{{$pedidoVenda->situacao_descricao}}</td>
                        <td>{{number_format($pedidoVenda->titulo->preco,2 ,',','.')}}</td>
                        <td style="width: 30%">
                          @if($pedidoVenda->situacao == 1)
                          <a class="waves-effect waves-light btn black" href="{{ route('pedidosVendas.show', ['$pedidoVenda' => $pedidoVenda->id]) }}">
                              <span style="font-size: 14px; color: white">Ver</span>
                          </a>
                          @else
                            <a  class="waves-effect waves-light btn" href="{{ route('pedidosVendas.edit', ['$pedidoVenda' => $pedidoVenda->id]) }}">
                                <span style="font-size: 14px;color: white">Editar</span>
                            </a>
                            <a class="waves-effect waves-light btn black" href="{{ route('pedidosVendas.show', ['$pedidoVenda' => $pedidoVenda->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há pedidos.</p>
            @endif
        </div>
        {{ $pedidosVendas->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
