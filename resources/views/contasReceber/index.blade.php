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
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar uma Receita (digite o Nome)" value="{{$filter}}">
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
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($contasReceber as $contaReceber)
                    <tr class="with-options">
                        <td>{{$contaReceber->id}}</td>
                        <td>{{$contaReceber->descricao}}</td>
                        <td>{{date("d-m-Y", strtotime($contaReceber->data))}}</td>
                        <td>{{$contaReceber->idCliente}}</td>
                        <td>{{$contaReceber->valor}}</td>
                        <td class="options">
                            <a href="{{ route('contasReceber.show', ['$contaReceber' => $contaReceber->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
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
