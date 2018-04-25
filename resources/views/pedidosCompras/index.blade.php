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
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Fornecedor (digite o Nome)" value="{{$filter}}">
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
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Fornecedor</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pedidosCompras as $pedidoCompra)
                    <tr class="with-options">
                        <td>{{$pedidoCompra->id}}</td>
                        <td>{{$pedidoCompra->nome}}</td>
                        <td>{{date("d-m-Y", strtotime($pedidoCompra->data))}}</td>
                        <td>{{$pedidoCompra->fornecedor}}</td>
                        <td class="options">
                            <a href="{{ route('pedidosCompras.show', ['$pedidoCompra' => $pedidoCompra->id]) }}">
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
        {{ $pedidosCompras->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
