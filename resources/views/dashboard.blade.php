@extends('templates.template', [
    'title'=> 'Dashboard',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'dashboard'
])
@section('container')

<div class="row"><h2 style="text-align: center">Resultados Por Mês</h2>
    <div class="col s4"><h4 style="text-align: center">Pedidos Compra</h4>
        <div id="chartcompra"></div>
    </div>
    <div class="col s4"><h4 style="text-align: center">Pedidos Venda</h4>
        <div id="chartvenda"></div>
    </div>
    <div class="col s4"><h4 style="text-align: center">Clientes</h4>
        <div id="chartcliente"></div>
    </div>
    <div class="col s4"><h4 style="text-align: center">Fornecedores</h4>
        <div id="chartfornecedores"></div>
    </div>
    <div class="col s4"><h4 style="text-align: center">Produtos</h4>
        <div id="charprodutos"></div>
    </div>
    <div class="col s4"><h4 style="text-align: center">Categorias</h4>
        <div id="chartcategorias"></div>
    </div>

</div>
<script>

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.collapsible');
  var instances = M.Collapsible.init(elems, options);
});

// Or with jQuery

$(document).ready(function(){
  $('.collapsible').collapsible();
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chartcompra',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @foreach($pedidocomprabar as $sale)
         {'x': '{{ $sale->mes }}/{{$sale->ano}}', 'y': '{{ $sale->contador }}'},
     @endforeach
  ],


  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  yLabelFormat: function(y){return y.toString();},
  parseTime: false,
  hideHover: false,
  stacked: true,
  lineColors:['rgb(255, 0 ,0)']
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chartvenda',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @foreach($pedidovendabar as $sale)
         {'x': '{{ $sale->mes }}/{{$sale->ano}}', 'y': '{{ $sale->contador }}'},
     @endforeach
  ],

  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  yLabelFormat: function(y){return y.toString();},
  parseTime: false,
  hideHover: false,
  stacked: true
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chartcliente',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @foreach($clientesmes as $sale)
         {'x': '{{ $sale->mes }}/{{$sale->ano}}', 'y': '{{ $sale->contador }}'},
     @endforeach
  ],

  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  yLabelFormat: function(y){return y.toString();},
  parseTime: false,
  hideHover: false,
  stacked: true,
  lineColors:['green']
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chartfornecedores',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @foreach($fornecedoresmes as $sale)
         {'x': '{{ $sale->mes }}/{{$sale->ano}}', 'y': '{{ $sale->contador }}'},
     @endforeach
  ],

  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  yLabelFormat: function(y){return y.toString();},
  parseTime: false,
  hideHover: false,
  stacked: true,
  lineColors:['green']
});

new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'charprodutos',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @foreach($produtosmes as $sale)
         {'x': '{{ $sale->mes }}/{{$sale->ano}}', 'y': '{{ $sale->contador }}'},
     @endforeach
  ],

  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  yLabelFormat: function(y){return y.toString();},
  parseTime: false,
  hideHover: false,
  stacked: true,
  lineColors:['blue']
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chartcategorias',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @foreach($categoriasmes as $sale)
         {'x': '{{ $sale->mes }}/{{$sale->ano}}', 'y': '{{ $sale->contador }}'},
     @endforeach
  ],

  xkey: 'x',
  ykeys: ['y'],
  labels: ['Pedidos'],
  yLabelFormat: function(y){return y.toString();},
  parseTime: false,
  hideHover: false,
  stacked: true,
  lineColors:['red']
});


</script>

@endsection
