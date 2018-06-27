@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosTitulos'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Pagamento do Pedido
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('pedidosVendas.pedidoTitulo.store', ['pedidoVenda' => $pedidoVenda->id])}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedidoTitulo->id }}" />
                <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoTitulo->idPedido }}" />
                <div class="row">
                  <div class="input col s6">
                      <label for="dataEmissao">Data Emissão</label><br />
                      <input type="date" name="dataEmissao" id="dataEmissao" placeholder="Data" value="{{ $pedidoTitulo->dataEmissao }}">
                  </div>

                  <div class="input col s6">
                       <label for="situacao">Situação *</label><br />
                    <select class="browser-default" required name="situacao">
                      <option value="">Selecione</option>
                      <option value="Aberto">Aberto</option>
                      <option value="Fechado">Baixado</option>
                      <option value="Atrasado">Atrasado</option>
                    </select>
                  </div>

                  <div class="input col s6" >
                    <label for="tipoPagamento">Tipo Documento</label><br />
                    <select class="browser-default" name="tipoPagamento">

                      <option value="0">Boleto</option>
                      <option value="1">Cartão de Crédito</option>
                      <option value="2">Cartão de Débito</option>
                      <option value="3">Cheque</option>
                      <option value="4">Duplicata</option>
                      <option value="5">Promissória</option>
                      <option value="6">Recibo</option>

                    </select>
                  </div>

                  <div class="input col s5">
                      <label for="dataVencimento">Data Vencimento</label><br />
                      <input type="date" name="dataVencimento" id="dataVencimento" placeholder="Data" value="{{ $pedidoTitulo->dataVencimento }}">
                  </div>
                  <div class="input col s6">
                      <label for="parcelas">Parcelas (Preencha apenas para lançamentos parcelados)</label><br />
                      <input type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $pedidoTitulo->parcelas }}">
                  </div>


                  <div class="input col s6">
                      <label for="preco">Valor</label><br />
                      <input type="text" name="preco" id="preco" placeholder="Valor" value="{{ $pedidoTitulo->valor }}">
                  </div>
                </div>


                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosVendas.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
