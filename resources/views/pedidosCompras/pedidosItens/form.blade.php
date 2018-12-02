@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosItens'
])
@section('container')

<script>
function calculo()
{
//passando os valores do campo do form para as variaveis

valor1 = parseFloat(document.meu_form.quantidade.value);
valor2 = parseFloat(document.meu_form.valorUnitario.value);

soma = eval(valor1 * valor2); //fazendo a soma

//no evento do onblur para que nao apareça 'undefined'
//eu faço a seguinte condição
//se a soma for diferente de undefined ele mostra no valor total
if(soma != undefined)
{
document.meu_form.preco.value = soma;
}
}
</script>

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Pedido Item - Pedido Compra #{{ $pedidoCompra->id }}
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" name="meu_form" action="{{route('pedidosCompras.pedidoItem.store', ['pedidoCompra' => $pedidoCompra->id])}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedidoItem->id }}" />
                <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoItem->idPedido }}" />
                <div class="row">
                  <div class="input col s6">
                    <label for="idFornecedor">Fornecedor</label><br />
                    <select class="browser-default" name="idFornecedor">
                    @foreach($fornecedores as $fornecedor)
                      <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input col s6">
                    <label for="idProduto">Produto</label><br />
                    <select class="browser-default" name="idProduto">
                    @foreach($produtos as $produto)
                      <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="input col s6">
                        <label for="quantidade">Quantidade</label><br />
                        <input type="text" name="quantidade" id="quantidade" min="1" placeholder="Quantidade" value="{{ $pedidoItem->quantidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="valorUnitario">Valor Unitário</label><br />
                        <input type="text" name="valorUnitario" id="valorUnitario" >

                    </div>
                    <div class="input col s6">
                        <label for="preco">Valor Total</label><br />
                        <input type="text" onBlur="calculo();" name="preco" id="preco" value="{{ $pedidoItem->preco }}">

                    </div>

                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosCompras.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
