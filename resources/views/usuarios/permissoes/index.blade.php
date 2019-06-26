@extends('templates.template-v2', [
  'title' => 'Permissões',
  'breadcrumb' => [
    'permissoes.index' => 'Permissões'
  ]
])

@section('container')


<div class="row">
    <div class="col s12">
        <p class="card-intro">
            &nbsp;
            <a class="waves-effect waves-teal blue btn-floating right" href="{{ route('permissoes.create') }}">
                <i class="mdi mdi-plus"></i>
            </a>
        </p>
        <div class="card">
            <div class="card-content">
                @if(count($permissoes))
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descricao</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($permissoes as $permissao)
                        <tr class="with-options">
                            <td>{{$permissao->id}}</td>
                            <td>{{$permissao->descricao}}</td>
                            <td class="options">
                                <a href="{{ route('permissoes.edit', ['permissao' => $permissao->id]) }}">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="alert-disable">Não há permissões cadastradas.</p>
                @endif
            </div>
        </div>
        {{ $permissoes->appends(['filter'=>$filter])->links() }}
    </div>
</div>


@endsection
