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
            Nome: {{ $contaPagar->descricao }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Descrição: </b>{{ $contaPagar->descricao }}</p>
            <p><b>Data: </b>{{ date('d/m/Y' , strtotime($contaPagar->dataEmissao)) }}</p>
            <p><b>Situacao: </b>{{ $contaPagar->situacao_descricao}}</p>
            <p><b>Valor Despesa: </b>{{ number_format($contaPagar->valor, 2,',','.') }}</p>

        </div>
    </div>

</div>
<div class="row">
<form method="post" action="{{route('contasPagar.store')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="id" name="id" value="{{ $contaPagar->id }}" />
  <input type="hidden" id="baixa" name="baixa" value="{{ $contaPagar->baixa }}" />
  <div class="col s12">
    <div class="input col s4">
         <label for="situacao">Situação *</label><br />
      <select class="browser-default" required name="situacao">
        <option value="" >Selecione</option>
        <option value="0" <?php if($contaPagar->situacao == 0) {echo 'selected';} ?>>Aberto</option>
        <option value="1" <?php if($contaPagar->situacao == 1) {echo 'selected';} ?>>Baixado</option>
        <option value="2" <?php if($contaPagar->situacao == 2) {echo 'selected';} ?>>Atrasado</option>
      </select>

    </div>
    <div class="input col s4">
        <label for="dataPagamento">Data Pagamento</label><br />
        <input type="date" name="dataPagamento" id="dataPagamento" placeholder="Data" value="{{ $contaPagar->dataPagamento }}">
    </div>
    <div class="input col s4">
        <label for="valorPago">Valor Pago </label><br />
        <input type="text" name="valorPago" id="valorPago" min="0" value="{{ $contaPagar->valorPago }}">
    </div>
  </div>
  <div class="row">
      <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
      <a class="waves-effect waves-green btn-flat right" href="{{ route('contasReceber.index') }}">Cancelar</a>
  </div>
</form>
</div>


@endsection
