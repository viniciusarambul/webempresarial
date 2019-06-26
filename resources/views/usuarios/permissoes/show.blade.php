@extends('templates.template-v2', [
  'title' => 'Visualizar Grupo',
  'breadcrumb' => [
    'grupos.index' => 'Grupos',
    'grupos.show' => [
      'title' => sprintf('Grupo #%s', $grupo->id),
      'params' => [
        'valor' => $grupo->id
      ]
    ],
  ]
])
@section('container')
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h4 class="no-margin-top">
          {{ $grupo->descricao }}
        </h4>

      </div>
    </div>
  </div>

  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <div class="card-title">
            Permissões
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
