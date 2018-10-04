@extends('templates.template', [
    'title'=> 'usuarios',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folder',
    'active_router'=> 'usuarios'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Usuarios
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('usuarios.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Usuario (digite o Nome)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('usuarios.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($usuarios))
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr class="with-options">
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->descricao}}</td>
                        <td class="options">
                            <a href="{{ route('usuarios.show', ['$usuario' => $usuario->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há usuarios.</p>
            @endif
        </div>
        {{ $usuarios->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
