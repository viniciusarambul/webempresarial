@extends('templates.template', [
    'title'=> 'Contas Receber',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-coin',
    'active_router'=> 'contasReceber'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Conta Receber
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('contasReceber.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar uma Receita (digite a Descrição)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('contasReceber.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($contasReceber))
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Data de Emissão</th>
                        <th>Data de Vencimento</th>
                        <th>Vendedor</th>
                        <th>Cliente</th>
                        <th>Situação</th>
                        <th>Valor</th>
                        <th style="text-align: center">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($contasReceber as $contaReceber)
                    <tr class="with-options">
                        <td>{{$contaReceber->id}}</td>
                        <td>{{$contaReceber->descricao}}</td>
                        <td>{{date("d/m/Y", strtotime($contaReceber->dataEmissao))}}</td>
                        <td>{{date("d/m/Y", strtotime($contaReceber->dataVencimento))}}</td>
                        <td>{{$contaReceber->clientes ? $contaReceber->clientes->nome : ''}}</td>
                        <td>{{$contaReceber->vendedores ? $contaReceber->vendedores->nome : ''}}</td>
                        <td>{{$contaReceber->situacao_descricao}}</td>
                        <td>{{number_format($contaReceber->valor, 2,',','.')}}</td>
                        <td style="width: 30%">
                            @if($contaReceber->situacao != 1)
                            <a  class="waves-effect waves-light btn" href="{{ route('contasReceber.edit', ['$contaReceber' => $contaReceber->id]) }}">
                                <span style="font-size: 14px;color: white">Editar</span>
                            </a>
                            <a class="waves-effect waves-light btn blue" href="{{ route('contasReceber.baixa', ['$contaReceber' => $contaReceber->id]) }}">
                                <span style="font-size: 14px; color: white">Baixar</span>
                            </a>
                            <a class="waves-effect waves-light btn black" href="{{ route('contasReceber.show', ['$contaReceber' => $contaReceber->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                            @else
                            <a class="waves-effect waves-light btn black" href="{{ route('contasReceber.show', ['$contaReceber' => $contaReceber->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                            <a class="waves-effect waves-light btn red" href="{{ route('contasReceber.baixa', ['$contaReceber' => $contaReceber->id]) }}">
                                <span style="font-size: 14px; color: white">Cancelar Baixa</span>
                            </a>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há contas a receber.</p>
            @endif
        </div>
        {{ $contasReceber->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
