@extends('templates.template', [
    'title'=> 'categorias',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folder',
    'active_router'=> 'categorias'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Categorias
        </h4>
    </div>
</div>


<form class="row no-margin-bottom" method="GET" action="{{ route('categorias.index') }}">
    <div class="input col m6">
        <input type="text" name="filter" class="no-margin-bottom" placeholder="Buscar um Categoria (digite o Nome)" value="{{$filter}}">
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
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('categorias.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            @if(count($categorias))
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($categorias as $categoria)
                    <tr class="with-options">
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->descricao}}</td>
                        <td class="options">
                            <a href="{{ route('categorias.show', ['$categoria' => $categoria->id]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="alert-disable">Não há categorias.</p>
            @endif
        </div>
        {{ $categorias->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
