@extends('templates.template', [
    'title'=> 'fornecedores',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-truck',
    'active_router'=> 'fornecedores'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Fornecedores
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('fornecedores.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Fornecedor (digite o CPF ou CNPJ)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('fornecedores.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($fornecedores))
            <table>
                <thead>
                    <tr>
                        <th>Fornecedor</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>CNPJ</th>
                        <th>E-mail</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($fornecedores as $fornecedor)
                    <tr class="with-options">
                        <td>{{$fornecedor->nome}}</td>
                        <td>{{$fornecedor->telefone}}</td>
                        <td>{{$fornecedor->cpf}}</td>
                        <td>{{$fornecedor->cnpj}}</td>
                        <td>{{$fornecedor->email}}</td>
                        <td>{{$fornecedor->cidade}}</td>
                        <td style="width: 30%">
                            <a  class="waves-effect waves-light btn" href="{{ route('fornecedores.edit', ['$fornecedor' => $fornecedor->id]) }}">
                                <span style="font-size: 14px;color: white">Editar</span>
                            </a>
                            <a class="waves-effect waves-light btn black" href="{{ route('fornecedores.show', ['$fornecedor' => $fornecedor->id]) }}">
                                <span style="font-size: 14px; color: white">Ver</span>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há Fornecedores cadastrados.</p>
            @endif
        </div>
        {{ $fornecedores->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
