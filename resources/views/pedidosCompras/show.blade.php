@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Pedidos de Compras</h1>
                          </div>
                      </div>
                  </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Table-Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">



                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <h5>Dados do Pedido:   {{ $pedidoCompra->nome }}</h5>
                                <div class="row">
                                <div class="col-lg-3">
                                    <label for="nome">Descrição *</label><br />
                                    <input class="form-control input-default " readonly type="text" name="nome" id="nome" placeholder="Descrição" value="{{ $pedidoCompra->nome }}">
                                </div>
                                <div class="col-lg-3">
                                    <label for="data">Data *</label><br />
                                    <input class="form-control input-default " readonly type="text" name="data" id="data" required placeholder="Data" value="{{ date('d/m/Y', strtotime($pedidoCompra->data)) }}">
                                </div>
                                <div class="col-lg-3">
                                    <label for="data">Situação</label><br />
                                    <input class="form-control input-default " readonly type="text" required value="{{ $pedidoCompra->situacao_descricao }}">
                                </div>

                              </div>
                              @if($pedidoCompra->situacao == 1)

                              @else
                              <div class="row">
                                <div class="col-lg-6">
                                <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"   href="{{ route('pedidosCompras.edit', ['$pedidoCompra' => $pedidoCompra->id]) }}"><i class="ti-settings"></i>Editar</a>
                                <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosCompras.destroy', ['$pedidoCompra' => $pedidoCompra->id]) }}"><i class="ti-settings"></i>Excluir</button></a>

                              </div>
                              </div>
                              @endif
                            </div>
                          </div>
                        </div>


                      <div class="row">
                        <div class="col s12">
                          @if($pedidoCompra->situacao == 1 )

                          @else

                                &nbsp;
                            <!--    <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosCompras.pedidoItem.create',['pedidoCompra' => $pedidoCompra->id]) }}">
                                  <i class="ti-plus"></i>Adicionar Produto

                                </a> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModal">
                                  Adicionar Produtos
                                </button>

                            @endif
                            <div class="card">
                              <?php $totalpedido = 0; ?>
                                @if(count($pedidoCompra->itens))
                                <table>
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
                                        @foreach($pedidoCompra->itens as $item)

                                        <tr class="with-options">
                                            <td>{{$item->produto->nome}}</td>
                                            <td>{{$item->quantidade}}</td>
                                            <td>{{number_format($item->valorUnitario, 2, ',', '.')}}</td>
                                            <td>{{number_format($item->preco, 2, ',', '.')}}</td>
                                            <td >
                                @if($pedidoCompra->situacao == 1)

                                              @else

                                              <form class="col s12 m4" method="post" action="{{ route('pedidosCompras.pedidoItem.destroy',['idPedido' => $pedidoCompra->id, 'id' => $item->id])}}">
                                                  {{ csrf_field() }}
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <input type="hidden" name="id" id="id" value="{{$item->id}}">
                                                   <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosCompras.pedidoItem.edit', ['idPedido' => $pedidoCompra->id, 'id' => $item->id]) }}"><i class="ti-settings"></i>Editar</a>

                                                   <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('pedidosCompras.pedidoItem.destroy', ['idPedido' => $pedidoCompra->id, 'id' => $item->id]) }}"><i class="ti-settings"></i>Excluir</button>


                                              </form>
                                            @endif

                                            </td>

                                        </tr>
                                        <?php $totaltudo = $totalpedido+=$item->preco;?>
                                        @endforeach

                                        <tr>
                                          <td colspan="3" style="text-align: right">Total</td>
                                          <td colspan="1">{{number_format($pedidoCompra->totalpreco, 2, ',', '.')}}</td>
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
                              @if($pedidoCompra->situacao == 1)

                              @else

                              @if(empty($pedidoCompra->titulo))
                            
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPagamento">
                                  Adicionar Pagamento
                                </button>
                                @else
                                <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosCompras.pedidoTitulo.edit',['pedidoCompra' => $pedidoCompra->id,'pedidoTitulo' => $pedidoCompra->titulo->id ]) }}">
                                    <i class="ti-plus"></i>Editar
                                </a>
                                @endif
                                @endif


                            <h5>Dados do Pagamento</h5>
                            @if(!empty($pedidoCompra->titulo))
                              <p><b>Codigo Titulo: </b>{{ $pedidoCompra->titulo->id }}</p>
                              <p><b>Data Emissão: </b>{{ date('d/m/Y', strtotime($pedidoCompra->titulo->dataEmissao)) }}</p>
                              <p><b>Primeiro Vencimento: </b>{{ date('d/m/Y', strtotime($pedidoCompra->titulo->dataVencimento)) }}</p>
                              <p><b>Situacao: </b>{{ $pedidoCompra->titulo->situacao }}</p>
                              <p><b>Parcelas: </b>{{ $pedidoCompra->titulo->parcelas }}</p>
                              @else
                              <p>Não existe Dados de Pagamento do Pedido</p>
                              @endif
                          </div>


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
              </script>


              <div class="modal" tabindex="-1" role="dialog" id="meuModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">

                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <form method="post" name="meu_form" action="{{route('pedidosCompras.pedidoItem.store', ['pedidoCompra' => $pedidoCompra->id])}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="id" name="id" value="{{ $pedidoItem->id }}" />
                                            <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoItem->idPedido }}" />
                                            <div class="row">

                                              <div class="col-lg-6">
                                                <label for="idProduto">Produto</label><br />
                                                <select class="form-control input-default " name="idProduto">
                                                @foreach($produtos as $produto)
                                                  <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                                <div class="col-lg-6">
                                                    <label for="quantidade">Quantidade</label><br />
                                                    <input class="form-control input-default " type="text" name="quantidade" id="quantidade" min="1" placeholder="Quantidade" value="{{ $pedidoItem->quantidade }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="valorUnitario">Valor Unitário</label><br />
                                                    <input class="form-control input-default " type="text" name="valorUnitario" id="valorUnitario" >

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
                        <a class="btn btn-danger btn-flat m-b-15 m-l-15"href="{{ route('pedidosCompras.show', ['pedidoCompra' => $pedidoCompra->id]) }}">Cancelar</a>
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
                          <form method="post" action="{{route('pedidosCompras.pedidoTitulo.store', ['pedidoCompra' => $pedidoCompra->id])}}" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" id="id" name="id" value="{{ $pedidoTitulo->id }}" />
                              <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoTitulo->idPedido }}" />
                              <div class="row">

                                <div <div class="col-lg-6">
                                    <label for="dataEmissao">Data Emissão</label><br />
                                    <input class="form-control input-default " type="date" name="dataEmissao" id="dataEmissao" placeholder="Data" value="{{ $pedidoTitulo->dataEmissao }}">
                                </div>

                                <div <div class="col-lg-6">
                                     <label for="situacao">Situação *</label><br />
                                  <select class="form-control input-default " required name="situacao">
                                    <option value="">Selecione</option>
                                    <option value="Aberto" <?php if($pedidoCompra->situacao == 'Aberto') {echo 'selected';} ?>selected>Aberto</option>
                                    <option value="Fechado" <?php if($pedidoCompra->situacao == 'Fechado') {echo 'selected';} ?>>Baixado</option>
                                    <option value="Atrasado" <?php if($pedidoCompra->situacao == 'Atrasado') {echo 'selected';} ?>>Atrasado</option>
                                  </select>
                                </div>


                                <div <div class="col-lg-6">
                                  <label for="tipoPagamento">Tipo Documento</label><br />
                                  <select class="form-control input-default " name="tipoPagamento">

                                    <option value="0" <?php if($pedidoCompra->situacao == '0') {echo 'selected';} ?>>Boleto</option>
                                    <option value="1" <?php if($pedidoCompra->situacao == '1') {echo 'selected';} ?>>Cartão de Crédito</option>
                                    <option value="2" <?php if($pedidoCompra->situacao == '2') {echo 'selected';} ?>>Cartão de Débito</option>
                                    <option value="6" <?php if($pedidoCompra->situacao == '6') {echo 'selected';} ?>>Recibo</option>

                                  </select>
                                </div>

                                <div <div class="col-lg-6">
                                    <label for="dataVencimento">Data Vencimento</label><br />
                                    <input class="form-control input-default " type="date" name="dataVencimento" id="dataVencimento" placeholder="Data" value="{{ $pedidoTitulo->dataVencimento }}">
                                </div>
                                <div <div class="col-lg-6">
                                    <label for="parcelas">Parcelas (Preencha apenas para lançamentos parcelados)</label><br />
                                    <input class="form-control input-default " type="text" name="parcelas" id="parcelas" placeholder="Parcelas" value="{{ $pedidoTitulo->parcelas }}">
                                </div>


                                <div <div class="col-lg-6">
                                    <label for="preco">Valor</label><br />
                                    <input class="form-control input-default " type="text" name="preco" id="preco" placeholder="Valor" value="{{ $pedidoCompra->totalpreco }}">
                                </div>
                              </div>
                              <div class="row" style="margin-top: 2%">
                                  <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                  <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('pedidosCompras.show', ['pedidoCompra' => $pedidoCompra->id] ) }}">Cancelar</a>
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
