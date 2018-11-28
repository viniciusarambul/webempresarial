@extends('templates.template', [
    'title'=> 'Relatórios',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-chart-line',
    'active_router'=> 'relatorios'
])
@section('container')

<div class="row"><h2 style="text-align: center">Relatórios Gerais</h2>
  <div class="col s12 m4" style="margin-top:-2.4%;">
    <p class="card-intro">
        &nbsp;
        <a class="waves-effect waves-teal blue btn-floating right" href="{{ url('consultas') }}">
            <i class="mdi mdi-chart-line"></i>
        </a>
    </p>
      <div class="card">
          <h5>Relatório de Clientes</h5>
          @foreach($clientescountativo as $sale)
          <p><b>Ativos: </b> {{ $sale->ativo }}</p>
          @endforeach
          @foreach($clientescountinativo as $sale)
          <p><b>Inativos: {{$sale->inativo}}</b></p>
          @endforeach
          @foreach($clientescount as $sale)
          <p><b>Total: </b>{{$sale->total}}</p>
          @endforeach

      </div>
  </div>
  <div class="col s12 m4" style="margin-top:-2.4%;">
    <p class="card-intro">
        &nbsp;
        <a class="waves-effect waves-teal blue btn-floating right" href="fornecedor/pdf">
            <i class="mdi mdi-chart-line"></i>
        </a>
    </p>
      <div class="card">
          <h5>Relatório de Fornecedores</h5>
          @foreach($fornecedorescountativo as $sale)
          <p><b>Ativos: </b> {{ $sale->ativo }}</p>
          @endforeach
          @foreach($fornecedorescountinativo as $sale)
          <p><b>Inativos: {{$sale->inativo}}</b></p>
          @endforeach
          @foreach($fornecedorescount as $sale)
          <p><b>Total: </b>{{$sale->total}}</p>
          @endforeach

      </div>
  </div>
  <div class="col s12 m4" style="margin-top:-2.4%;">
    <p class="card-intro">
        &nbsp;
        <a class="waves-effect waves-teal blue btn-floating right" href="vendedor/pdf">
            <i class="mdi mdi-chart-line"></i>
        </a>
    </p>
      <div class="card">
          <h5>Relatório de Vendedores</h5>
          @foreach($vendedorescountativo as $sale)
          <p><b>Ativos: </b> {{ $sale->ativo }}</p>
          @endforeach
          @foreach($vendedorescountinativo as $sale)
          <p><b>Inativos: {{$sale->inativo}}</b></p>
          @endforeach
          @foreach($vendedorescount as $sale)
          <p><b>Total: </b>{{$sale->total}}</p>
          @endforeach

      </div>
  </div>

</div>
<div class="row">

  <div class="col s12 m4" style="margin-top:-2.4%;">
    <p class="card-intro">
        &nbsp;
        <a class="waves-effect waves-teal blue btn-floating right" href="produto/pdf">
            <i class="mdi mdi-chart-line"></i>
        </a>
    </p>
      <div class="card">
          <h5>Relatório de Produtos</h5>
          @foreach($produtoscountativo as $sale)
          <p><b>Produtos: </b> {{ $sale->total }}</p>
          @endforeach
          @foreach($produtoscountinativo as $sale)
          <p><b>Categorias: {{$sale->categorias}}</b></p>
          @endforeach
          @foreach($produtoscount as $sale)
          <p><b>Total Estoque: </b>{{$sale->total_estoque}}</p>
          @endforeach

      </div>
  </div>

</div>


@endsection
