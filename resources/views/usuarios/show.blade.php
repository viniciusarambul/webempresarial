@extends('templates.template', [
    'title'=> 'usuarios',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folderk',
    'active_router'=> 'usuarios'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Usuario - {{ $usuario->descricao }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados da Usuario</h5>
            <p><b>Descricao: </b>{{ $usuario->descricao }}</p>

        </div>
    </div>

      <form class="col s12 m4" method="post" action="{{ route('usuarios.destroy',['id' => $usuario->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('usuarios.edit', ['id' => $usuario->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
