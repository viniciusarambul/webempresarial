@extends('templates.template', [
    'title'=> 'clientes',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'clientes'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Clientes
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('clientes.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Cliente (digite o CPF ou CNPJ)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('clientes.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($clientes))
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>CNPJ</th>
                        <th>E-mail</th>
                        <th>Cidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clientes as $cliente)
                    <tr class="with-options">
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td>{{$cliente->cpf}}</td>
                        <td>{{$cliente->cnpj}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->cidade}}</td>
                        <td style="width: 30%">
                            <a  class="waves-effect waves-light btn" href="{{ route('clientes.edit', ['$cliente' => $cliente->id]) }}">
                                <span style="font-size: 14px;color: white">Editar</span>
                            </a>
                            <a class="waves-effect waves-light btn black" href="{{ route('clientes.show', ['$cliente' => $cliente->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há clientes Cadastrados.</p>
            @endif
        </div>
        {{ $clientes->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
