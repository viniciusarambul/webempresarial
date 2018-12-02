@extends('templates.template', [
    'title'=> 'Baixa Contas Pagar',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'contasPagar'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Nome: {{ $contasPagar->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Descrição: </b>{{ $contasPagar->descricao }}</p>
            <p><b>Data: </b>{{ date('d/m/Y' , strtotime($contasPagar->dataEmissao)) }}</p>
            <p><b>Situacao: </b>{{ $contasPagar->situacao_descricao}}</p>
            <p><b>Valor Pedido: </b>{{ $contasPagar->valor }}</p>

        </div>
    </div>

</div>
<div class="row">
<form method="post" action="{{route('contasReceber.store')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="id" name="id" value="{{ $contasPagar->id }}" />
  <input type="hidden" id="baixa" name="baixa" value="{{ $contasPagar->baixa }}" />
  <div class="col s12">
    <div class="input col s4">
         <label for="situacao">Situação *</label><br />
      <select class="browser-default" required name="situacao">
        <option value="" >Selecione</option>
        <option value="0" <?php if($contasPagar->situacao == 0) {echo 'selected';} ?>>Aberto</option>
        <option value="1" <?php if($contasPagar->situacao == 1) {echo 'selected';} ?>>Baixado</option>
        <option value="2" <?php if($contasPagar->situacao == 2) {echo 'selected';} ?>>Atrasado</option>
      </select>

    </div>
    <div class="input col s6">
        <label for="dataPagamento">Data Pagamento</label><br />
        <input type="date" name="dataPagamento" id="dataPagamento" placeholder="Data" value="{{ $contasPagar->dataPagamento }}">
    </div>
    <div class="input col s6">
        <label for="valorPago">Valor Pago </label><br />
        <input type="text" name="valorPago" id="valorPago" min="0" value="{{ $contasPagar->valorPago }}">
    </div>
  </div>
  <div class="row">
      <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
      <a class="waves-effect waves-green btn-flat right" href="{{ route('contasReceber.index') }}">Cancelar</a>
  </div>
</form>
</div>


@endsection
