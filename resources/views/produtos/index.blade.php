@extends('templates.template', [
    'title'=> 'produtos',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folder',
    'active_router'=> 'produtos'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Produtos
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('produtos.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Produto (digite o Nome)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('produtos.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($produtos))
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Descricao</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($produtos as $produto)
                    <tr class="with-options">
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->valorUnitario}}</td>
                        <td>{{$produto->quantidade}}</td>
                        <td class="options">
                            <a href="{{ route('produtos.show', ['$produto' => $produto->id]) }}">
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
        {{ $produtos->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
