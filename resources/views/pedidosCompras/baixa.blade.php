@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosCompras'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Nome: {{ $pedidoCompra->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Nome: </b>{{ $pedidoCompra->nome }}</p>
            <p><b>Data: </b>{{ $pedidoCompra->data }}</p>
            <p><b>Situacao: </b>{{ $pedidoCompra->situacao_descricao }}</p>
            <p><b>Valor Pedido: </b>{{ $pedidoCompra->valor }}</p>

        </div>
    </div>

</div>
<div class="row">
<form method="get" action="{{route('pedidosCompras.store')}}" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="id" name="id" value="{{ $pedidoCompra->id }}" />
  <div class="col s12">
    <div class="input col s4">
         <label for="situacao">Situação *</label><br />
      <select class="browser-default" required name="situacao">
        <option value="" >Selecione</option>
        <option value="0" <?php if($pedidoCompra->situacao == 0) {echo 'selected';} ?>>Aberto</option>
        <option value="1" <?php if($pedidoCompra->situacao == 1) {echo 'selected';} ?>>Fechado</option>
        <option value="2" <?php if($pedidoCompra->situacao == 2) {echo 'selected';} ?>>Cancelado</option>
      </select>
    </div>

    <div class="input col s6">
        <label for="valorPago">Valor Pago </label><br />
        <input type="text" name="valorPago" id="valorPago" min="0" placeholder="Valor Pago" value="{{ $pedidoCompra->valorPago }}">
    </div>
  </div>
</form>
</div>


@endsection
