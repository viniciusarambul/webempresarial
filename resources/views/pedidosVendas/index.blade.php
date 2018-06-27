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
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Cliente</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidosVendas as $pedidoVenda)
                    <tr class="with-options">
                        <td>{{$pedidoVenda->id}}</td>
                        <td>{{$pedidoVenda->nome}}</td>
                        <td>{{date("d-m-Y", strtotime($pedidoVenda->data))}}</td>
                        <td>{{$pedidoVenda->cliente}}</td>
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
            <p class="alert-disable">Não há pedidos.</p>
            @endif
        </div>
        {{ $pedidosVendas->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
