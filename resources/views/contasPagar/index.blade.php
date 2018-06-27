@extends('templates.template', [
    'title'=> 'Contas Pagar',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-currency-usd',
    'active_router'=> 'contasPagar'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Conta Pagar
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('contasPagar.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar uma Despesa (digite o Nome)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('contasPagar.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($contasPagar))
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Data de Emissão</th>
                        <th>Data de Vencimento</th>
                        <th>Fornecedor</th>
                        <th>Situação</th>
                        <th>Valor</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($contasPagar as $contaPagar)
                    <tr class="with-options">
                        <td>{{$contaPagar->id}}</td>
                        <td>{{$contaPagar->descricao}}</td>
                        <td>{{date("d-m-Y", strtotime($contaPagar->dataEmissao))}}</td>
                        <td>{{date("d-m-Y", strtotime($contaPagar->dataVencimento))}}</td>
                        <td>{{$contaPagar->idFornecedor}}</td>
                        <td>{{$contaPagar->situacao}}</td>
                        <td>{{$contaPagar->valor}}</td>
                        <td class="options">
                            <a href="{{ route('contasPagar.show', ['$contaPagar' => $contaPagar->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há Contas a pagar.</p>
            @endif
        </div>
        {{ $contasPagar->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
