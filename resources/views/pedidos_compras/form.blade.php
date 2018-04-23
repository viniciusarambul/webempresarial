@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidos_compras'
])
@section('container')

<script>
$(document).ready(function(){
  $('.date').mask('11/11/1111');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.telefone').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('000.000.0000-00', {reverse: true});
});
</script>

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Pedido Compra
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('pedidos_compras.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedido_compra->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="nome">Nome</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $pedido_compra->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="data">Data</label><br />
                        <input type="date" name="data" id="data" placeholder="Data" value="{{ $pedido_compra->data }}">
                    </div>
                    <div class="input col s6">
                        <label for="situacao">Situacao</label><br />
                        <input type="text" name="situacao" id="situacao" placeholder="situacao" value="{{ $pedido_compra->situacao }}">
                    </div>
                    <div class="input col s6">
                        <label for="fornecedor">Fornecedor</label><br />
                        <input type="text" name="fornecedor" id="fornecedor" placeholder="fornecedor" value="{{ $pedido_compra->fornecedor }}">
                    </div>
                    <div class="input col s6">
                        <label for="produto">Produto</label><br />
                        <input type="text" name="produto" id="produto" placeholder="produto" value="{{ $pedido_compra->produto }}">
                    </div>
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidos_compras.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
