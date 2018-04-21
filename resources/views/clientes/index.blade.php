@extends('templates.template', [
    'title'=> 'clientes',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-truck',
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('clientes.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($clientes))
            <table>
                <thead>
                    <tr>
                        <th>Fornecedor</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Cidade</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clientes as $cliente)
                    <tr class="with-options">
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->cidade}}</td>
                        <td class="options">
                            <a href="{{ route('clientes.show', ['$cliente' => $cliente->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há alunos vinculados à esta escola.</p>
            @endif
        </div>
        {{ $clientes->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
