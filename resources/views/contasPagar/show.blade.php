@extends('templates.template', [
    'title'=> 'Conta Pagar',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-currency-usd',
    'active_router'=> 'contasPagar'
])
@section('container')

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            {{ $contaPagar->nome }}
        </h4>
    </div>
</div>


<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <h5>Dados do Pedido</h5>
            <p><b>Descrição: </b>{{ $contaPagar->descricao }}</p>
            <p><b>Data: </b>{{ $contaPagar->data }}</p>
            <p><b>Fornecedor: </b>{{ $contaPagar->idFornecedor }}</p>
            <p><b>Situacao: </b>{{ $contaPagar->situacao }}</p>
            <p><b>Produto: </b>{{ $contaPagar->idProduto }}</p>
            <p><b>Quantidade: </b>{{ $contaPagar->quantidade }}</p>
            <p><b>Parcelas: </b>{{ $contaPagar->parcelas }}</p>
            <p><b>Tipo de Pagamento: </b>{{ $contaPagar->tipoPagamento }}</p>
            <p><b>Valor: </b>{{ $contaPagar->valor }}</p>

        </div>
    </div>



      <form class="col s12 m4" method="post" action="{{ route('contasPagar.destroy',['id' => $contaPagar->id])}}">
        <h5>Ações</h5>

          {{ csrf_field() }}
           <input type="hidden" name="_method" value="DELETE">
           <button class="btn block red">Excluir</button>
        <a class="btn blue white-text" href="{{ route('contasPagar.edit', ['id' => $contaPagar->id ]) }}"><i class="mdi mdi-pencil"></i>Editar</a>
  </form>


  </div>


@endsection
