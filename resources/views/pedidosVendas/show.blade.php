@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">

        <div class="main" >
            <div class="container-fluid">

                <section id="main-content">



                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <h5>Dados do Pedido:   {{ $pedidoVenda->id }}</h5>
                                <div class="row">

                                <div class="col-lg-3">
                                    <label for="data">Data *</label><br />
                                    <input class="form-control input-default " readonly type="text" name="data" id="data" required placeholder="Data" value="{{ date('d/m/Y', strtotime($pedidoVenda->data)) }}">
                                </div>
                                <div class="col-lg-3">
                                    <label for="data">Situação</label><br />
                                    <input class="form-control input-default " readonly type="text" required value="{{ $pedidoVenda->situacao_descricao }}">
                                </div>

                              </div>
                              @if($pedidoVenda->situacao == 1 OR !empty($pedidoVenda->titulo ))

                              @else
                              <div class="row">
                                <div class="col-lg-6">
                                <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"   href="{{ route('pedidosVendas.edit', ['$pedidoVenda' => $pedidoVenda->id]) }}"><i class="ti-settings"></i>Editar</a>
                                <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosVendas.destroy', ['$pedidoVenda' => $pedidoVenda->id]) }}"><i class="ti-settings"></i>Excluir</button></a>

                              </div>
                              </div>
                              @endif
                            </div>
                          </div>
                        </div>


                      <div class="row">
                        <div class="col s12">
                          @if($pedidoVenda->situacao == 1  OR !empty($pedidoVenda->titulo ))

                          @else

                                &nbsp;
                            <!--    <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosVendas.pedidoItem.create',['pedidoVenda' => $pedidoVenda->id]) }}">
                                  <i class="ti-plus"></i>Adicionar Produto

                                </a> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModal">
                                  Adicionar Produtos
                                </button>

                            @endif
                            <div class="card table-responsive">
                              <?php $totalpedido = 0; ?>
                                @if(count($pedidoVenda->itens))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Valor Unitário</th>
                                            <th>Total</th>
                                            <th style="text-align: center">Ação</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($pedidoVenda->itens as $item)

                                        <tr class="with-options">
                                            <td>{{$item->produto->nome}}</td>
                                            <td>{{$item->quantidade}}</td>
                                            <td style="text-align: right">R$ {{number_format($item->valorUnitario, 2, ',', '.')}}</td>
                                            <td style="text-align: right">R$ {{number_format($item->preco, 2, ',', '.')}}</td>
                                            <td >
                                @if($pedidoVenda->situacao == 1 OR !empty($pedidoVenda->titulo ))

                                              @else

                                              <form class="col s12 m4" method="post" action="{{ route('pedidosVendas.pedidoItem.destroy',['idPedido' => $pedidoVenda->id, 'id' => $item->id])}}">
                                                  {{ csrf_field() }}
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <input type="hidden" name="id" id="id" value="{{$item->id}}">
                                                   <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosVendas.pedidoItem.edit', ['idPedido' => $pedidoVenda->id, 'id' => $item->id]) }}"><i class="ti-settings"></i>Editar</a>

                                                   <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosVendas.pedidoItem.destroy', ['idPedido' => $pedidoVenda->id, 'id' => $item->id]) }}"><i class="ti-settings"></i>Excluir</button>


                                              </form>
                                            @endif

                                            </td>

                                        </tr>
                                        <?php $totaltudo = $totalpedido+=$item->preco;?>
                                        @endforeach

                                        <tr>
                                          <td colspan="3" style="text-align: right">Total</td>
                                          <td colspan="1">{{number_format($pedidoVenda->totalpreco, 2, ',', '.')}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                                @else
                                <p class="alert-disable">Não há produtos.</p>
                                @endif
                            </div>
                        </div>


                      </div>

                      <div class="row">
                          <div class="col s12 m4">

                            <div class="card">
                              @if($pedidoVenda->situacao == 1 OR !empty($pedidoVenda->titulo ))

                              @else

                              @if(empty($pedidoVenda->titulo))

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPagamento">
                                  Adicionar Pagamento
                                </button>
                                @else
                                <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosVendas.pedidoTitulo.edit',['pedidoVenda' => $pedidoVenda->id,'pedidoTitulo' => $pedidoVenda->titulo->id ]) }}">
                                    <i class="ti-plus"></i>Editar
                                </a>
                                @endif
                                @endif


                                <h5>Dados do Pagamento</h5>

                                  @if(!empty($pedidoVenda->titulo))
                                  <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                              <th>Codigo Titulo:</th>
                                              <th>Data Emissão:</th>
                                              <th>Primeiro Vencimento:</th>
                                              <th>Situacao</th>
                                              <th>Parcelas</th>
                                              <th>Valor Total:</th>

                                          </tr>
                                      </thead>

                                      <tbody>
                                              <tr class="with-options">
                                              <td>{{$pedidoVenda->titulo->id}}</td>
                                              <td>{{date('d/m/Y', strtotime($pedidoVenda->titulo->dataEmissao))}}</td>
                                              <td>{{date('d/m/Y', strtotime($pedidoVenda->titulo->dataVencimento))}}</td>
                                              <td>{{$pedidoVenda->titulo->situacao}}</td>
                                              <td>{{ $pedidoVenda->titulo->parcelas }}</td>
                                              <td>{{ number_format($pedidoVenda->titulo->preco,2,',','.') }}</td>
                                            </tr>
                                     </tbody>
                                </table>
                                  <br />
                                  <div class="row">
                                  @foreach($pedidosVendaConta as $conta)
                                  <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Data Vencimento</th>
                                            <th>Valor</th>
                                            <th>Valor Pago</th>
                                            <th>Data Pagamento</th>


                                        </tr>
                                    </thead>

                                    <tbody>


                                        <tr class="with-options">
                                            <td>{{date('d/m/Y', strtotime($conta->dataVencimento))}}</td>
                                            <td>R$ {{ number_format($conta->valor,2,',','.') }}</td>
                                            <td>R$ {{ isset($conta->valorPago) ? number_format($conta->valorPago,2,',','.') : '0,00' }}</td>
                                            <td>{{ isset($conta->dataPagamento) ? date('d/m/Y', strtotime($conta->dataPagamento)) : '' }}</td>

                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    @endforeach
                                  </div>


                                @else
                                <p>Não existe Dados de Pagamento do Pedido</p>
                                @endif
                          </div>


                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nome">Observações do Pedido </label><br />
                            <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Observações" value="{{ $pedidoVenda->nome }}">
                        </div>
                    </div>

                    </section>
                  </div>
                </div>
              </div>

              <script>

              $('#meuModal').on('shown.bs.modal', function () {
                $('#meuInput').trigger('focus')
              })

              </script>


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


            $(document).ready(function(e) {

                $('#idProduto').on('change', function() {
                  var produto  = $('#idProduto option:selected').val();

                  console.log('Produto = '+ produto);

                  $.get('/produtos/' + produto, function (resposta) {
                     $('#id_produto div').remove();
                      $('#id_produto').append(resposta);

                     console.log(resposta);
                  });

                });


              });
              </script>


              <div class="modal" tabindex="-1" role="dialog" id="meuModal">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">

                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <form method="post" name="meu_form" action="{{route('pedidosVendas.pedidoItem.store', ['pedidoVenda' => $pedidoVenda->id])}}" enctype="multipart/form-data">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" id="id" name="id" value="{{ $pedidoItem->id }}" />
                                          <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoItem->idPedido }}" />
                                          <div class="row">

                                              <div class="col-lg-6">
                                                <label for="idProduto">Produto</label><br />
                                                <select id="idProduto" class="form-control input-default " name="idProduto">
                                                    <option value="">Selecione</option>
                                                @foreach($produtos as $produto)

                                                  <option value="{{ $produto->id }}">{{ $produto->id }} - {{ $produto->nome }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="col-lg-6">

                                             </div>
                                             <div class="row" id="id_produto">
                                             </div>
                                                <div class="col-lg-6">
                                                    <label for="quantidade">Quantidade</label><br />
                                                    <input class="form-control input-default " type="text" name="quantidade" id="quantidade" min="1" placeholder="Quantidade" value="{{ $pedidoItem->quantidade }}">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="preco">Valor Total</label><br />
                                                    <input class="form-control input-default " type="text" onBlur="calculo();" name="preco" id="preco" value="{{ number_format($pedidoItem->preco,2,',','.') }}">

                                                </div>

                                            </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                        <a class="btn btn-danger btn-flat m-b-15 m-l-15"href="{{ route('pedidosVendas.show', ['pedidoVenda' => $pedidoVenda->id]) }}">Cancelar</a>
                    </div>
                      </form>

                  </div>
                </div>
              </div>


      <!-- MODAL PAGAMENTO -->
      <div class="modal" tabindex="-1" role="dialog" id="modalPagamento">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="row">
                  <div class="col s12">
                      <div class="card">
                          <form method="post" action="{{route('pedidosVendas.pedidoTitulo.store', ['pedidoVenda' => $pedidoVenda->id])}}" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" id="id" name="id" value="{{ $pedidoTitulo->id }}" />
                              <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoTitulo->idPedido }}" />
                              <div class="row">

                                <div <div class="col-lg-6">
                                    <label for="dataEmissao">Data Emissão</label><br />
                                    <input class="form-control input-default " type="date" name="dataEmissao" required id="dataEmissao" placeholder="Data" value="{{ $pedidoTitulo->dataEmissao }}">
                                </div>

                                <div <div class="col-lg-6">
                                     <label for="situacao">Situação *</label><br />
                                  <select class="form-control input-default " readonly required name="situacao">
                                    <option value="">Selecione</option>
                                    <option value="Aberto" <?php if($pedidoVenda->situacao == 'Aberto') {echo 'selected';} ?>selected>Aberto</option>
                                    <option value="Fechado" <?php if($pedidoVenda->situacao == 'Fechado') {echo 'selected';} ?>>Baixado</option>
                                    <option value="Atrasado" <?php if($pedidoVenda->situacao == 'Atrasado') {echo 'selected';} ?>>Atrasado</option>
                                  </select>
                                </div>


                                <div <div class="col-lg-6">
                                  <label for="tipoPagamento">Tipo Documento</label><br />
                                  <select class="form-control input-default " name="tipoPagamento">

                                    <option value="0" <?php if($pedidoVenda->situacao == '0') {echo 'selected';} ?>>Boleto</option>
                                    <option value="1" <?php if($pedidoVenda->situacao == '1') {echo 'selected';} ?>>Cartão de Crédito</option>
                                    <option value="2" <?php if($pedidoVenda->situacao == '2') {echo 'selected';} ?>>Cartão de Débito</option>
                                    <option value="6" <?php if($pedidoVenda->situacao == '6') {echo 'selected';} ?>>Recibo</option>

                                  </select>
                                </div>

                                <div <div class="col-lg-6">
                                    <label for="dataVencimento">Data Vencimento</label><br />
                                    <input class="form-control input-default " type="date" name="dataVencimento" required id="dataVencimento" placeholder="Data" value="{{ $pedidoTitulo->dataVencimento }}">
                                </div>
                                <div <div class="col-lg-6">
                                    <label for="parcelas">Parcelas (Preencha apenas para lançamentos parcelados)</label><br />
                                    <input class="form-control input-default " type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $pedidoTitulo->parcelas }}">
                                </div>


                                <div <div class="col-lg-6">
                                    <label for="preco">Valor</label><br />
                                    <input class="form-control input-default " type="text" readonly name="preco" id="preco" placeholder="Valor" value="{{ $pedidoVenda->totalpreco }}">
                                </div>
                              </div>
                              <div class="row" style="margin-top: 2%">
                                  <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                  <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('pedidosVendas.show', ['pedidoVenda' => $pedidoVenda->id] ) }}">Cancelar</a>
                              </div>
                                </div>



                          </form>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>


@endsection
