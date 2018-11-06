@extends('templates.template', [
    'title'=> 'Estoque',
    'prev_router'=> 'estoque',
    'icon'=> 'mdi mdi-calendar-search',
    'active_router'=> 'estoque'
])
@section('container')



<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Estoque
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12">

        <div class="card">
            @if(count($produtos))
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                        <th>Fornecedor</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($produtos as $produto)
                    <tr class="with-options">
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->categorias->descricao}}</td>
                        <td>{{$produto->valorUnitario}}</td>
                        <td>{{$produto->fornecedores->nome}}</td>
                        <td>{{$produto->quantidade}}</td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há Produtos cadastrados.</p>
            @endif
        </div>
    </div>
</div>


@endsection
