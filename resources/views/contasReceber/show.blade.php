@extends('templates.template', [
    'title'=> 'Conta Pagar',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-coin',
    'active_router'=> 'contasReceber'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $contaReceber->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados da Receita</h5>
            <p><b>Descrição: </b>{{ $contaReceber->descricao }}</p>
            <p><b>Data de Emissão: </b>{{date("d-m-Y", strtotime( $contaReceber->dataEmissao)) }}</p>
            <p><b>Data de Vencimento: </b>{{ date("d-m-Y", strtotime($contaReceber->dataVencimento)) }}</p>
            <p><b>Cliente: </b>{{ $contaReceber->idCliente }}</p>
            <p><b>Situacao: </b>{{ $contaReceber->situacao_descricao }}</p>
            <p><b>Parcelas: </b>{{ $contaReceber->parcelas }}</p>
            <p><b>Tipo de Pagamento: </b>{{ $contaReceber->tipoPagamento }}</p>
            <p><b>Valor: </b>{{ $contaReceber->valor }}</p>
            <p><b>Data Pagamento: </b>{{ $contaReceber->dataPagamento ? date("d/m/Y", strtotime($contaReceber->dataPagamento)) : '' }}</p>
            <p><b>Valor Pago: </b>{{ $contaReceber->valorPago }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('contasReceber.destroy',['id' => $contaReceber->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('contasReceber.edit', ['id' => $contaReceber->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
