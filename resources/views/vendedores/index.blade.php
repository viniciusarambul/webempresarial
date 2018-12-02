@extends('templates.template', [
    'title'=> 'vendedores',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'vendedores'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Vendedores
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('vendedores.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Vendedor (digite o CPF ou CNPJ)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('vendedores.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($vendedores))
            <table>
                <thead>
                    <tr>
                        <th>Vendedor</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>CNPJ</th>
                        <th>E-mail</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vendedores as $vendedor)
                    <tr class="with-options">
                        <td>{{$vendedor->nome}}</td>
                        <td>{{$vendedor->telefone}}</td>
                        <td>{{$vendedor->cpf}}</td>
                        <td>{{$vendedor->cnpj}}</td>
                        <td>{{$vendedor->email}}</td>
                        <td>{{$vendedor->cidade}}</td>
                        <td style="width: 30%">
                            <a  class="waves-effect waves-light btn" href="{{ route('vendedores.edit', ['$vendedor' => $vendedor->id]) }}">
                                <span style="font-size: 14px;color: white">Editar</span>
                            </a>
                            <a class="waves-effect waves-light btn black" href="{{ route('vendedores.show', ['$vendedor' => $vendedor->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há vendedores Cadastrados.</p>
            @endif
        </div>
        {{ $vendedores->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
