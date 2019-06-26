@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">

                </div>
                <!-- /# row -->
                <section id="main-content">



                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <h5>Dados do Pedido:   {{ $pedidoCompra->nome }}</h5>
                                <div class="row">

                                <div class="col-lg-3">
                                    <label for="data">Data *</label><br />
                                    <input class="form-control input-default " readonly type="text" name="data" id="data" required placeholder="Data" value="{{ date('d/m/Y', strtotime($pedidoCompra->data)) }}">
                                </div>
                                <div class="col-lg-3">
                                    <label for="data">Situação</label><br />
                                    <input class="form-control input-default " readonly type="text" required value="{{ $pedidoCompra->situacao_descricao }}">
                                </div>

                              </div>
                              @if($pedidoCompra->situacao == 1 OR !empty($pedidoCompra->titulo ))


                              @else
                              <div class="row">
                                <div class="col-lg-6">
                                <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"   href="{{ route('pedidosCompras.edit', ['$pedidoCompra' => $pedidoCompra->id]) }}"><i class="ti-settings"></i>Editar</a>
                                <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#exclusao">Excluir</a>

                              </div>
                              </div>
                              @endif
                            </div>
                          </div>
                        </div>


                      <div class="row">
                        <div class="col s12">
                          @if(empty($pedidoCompra->titulo ))

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModal">
                                  Adicionar Produtos
                                </button>

                            @endif
                            <div class="card table-responsive">
                              <?php $totalpedido = 0; ?>
                                @if(count($pedidoCompra->itens))
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
                                        @foreach($pedidoCompra->itens as $item)

                                        <tr class="with-options">
                                            <td>{{$item->produto->nome}}</td>
                                            <td>{{$item->quantidade}}</td>
                                            <td>{{number_format($item->valorUnitario, 2, ',', '.')}}</td>
                                            <td style="text-align: right">R$ {{number_format($item->preco, 2, ',', '.')}}</td>
                                            <td >
                                @if($pedidoCompra->situacao == 1 OR !empty($pedidoCompra->titulo ))


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
                                          <td colspan="1">R$ {{number_format($pedidoCompra->totalpreco, 2, ',', '.')}}</td>
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
                            <!--    <a class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" href="{{ route('pedidosCompras.pedidoTitulo.edit',['pedidoCompra' => $pedidoCompra->id,'pedidoTitulo' => $pedidoCompra->titulo->id ]) }}">
                                    <i class="ti-plus"></i>Editar
                                </a>-->
                                @endif
                                @endif


                            <h5>Dados do Pagamento</h5>

                              @if(!empty($pedidoCompra->titulo))
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
                                          <td>{{$pedidoCompra->titulo->id}}</td>
                                          <td>{{date('d/m/Y', strtotime($pedidoCompra->titulo->dataEmissao))}}</td>
                                          <td>{{date('d/m/Y', strtotime($pedidoCompra->titulo->dataVencimento))}}</td>
                                          <td>{{$pedidoCompra->titulo->situacao}}</td>
                                          <td>{{ $pedidoCompra->titulo->parcelas }}</td>
                                          <td>{{ number_format($pedidoCompra->titulo->preco,2,',','.') }}</td>
                                        </tr>
                                 </tbody>
                            </table>
                              <br />
                              <div class="row">
                              @foreach($pedidosCompraConta as $conta)
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
                    <div class="card row">
                        <form method="post" action="{{route('pedidosCompras.observacao', ['pedidoCompra' => $pedidoCompra->id])}}" enctype="multipart/form-data">
                      <div class="col-lg-12">
                          <label for="nome">Observações</label><br />
                          <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Observação" required value="{{ $pedidoCompra->nome }}">

                      </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                  </form>
                    </div>

                    </section>
                  </div>
                </div>
              </div>

      <script>

      function calculo()
      {
      //passando os valores do campo do form para as variaveis
          valor1 = parseFloat(document.meu_form.quantidade.value);
          valor2 = parseFloat(document.meu_form.valorUnitario.value);

          soma = eval(valor1 * valor2); //fazendo a soma


      if(soma != undefined)
      {
      document.meu_form.preco.value = soma;
      }
      }

      function calculo1()
      {
      //passando os valores do campo do form para as variaveis

      valor3 = parseFloat(document.form_produto.produtoNovoQuantidade.value);
      valor4 = parseFloat(document.form_produto.produtoNovoValorUnitario.value);

      soma1 = eval(valor3 * valor4); //fazendo a soma

      //no evento do onblur para que nao apareça 'undefined'
      //eu faço a seguinte condição
      //se a soma for diferente de undefined ele mostra no valor total
      if(soma1 != undefined)
      {
      document.form_produto.produtoNovoPreco.value = soma1;
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
              <script>

              jQuery(document).ready(function(){
            		jQuery('#adicionarProduto').submit(function(){
                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                  });
            			jQuery.ajax({
                    url: "{{ url('/pedidosCompras/criarProduto') }}",
                  method: 'post',
                  data: {
                     nome: jQuery('#produtoNovoNome').val(),
                     categoria: jQuery('#produtoNovoCategoria').val(),
                     fornecedor: jQuery('#produtoNovoFornecedor').val(),
                     valorUnitario: jQuery('#produtoNovoValorUnitario').val(),
                     valorSugerido: jQuery('#produtoNovoValorSugerido').val(),
                     produtoNovoQuantidade: jQuery('#produtoNovoQuantidade').val(),
                     produtoNovoPreco: jQuery('#produtoNovoPreco').val()
                  },

            				success: function( data )
            				{
            					alert( data );
            				}
            			});

            			return false;
            		});
            	});


              </script>


              <div class="modal" tabindex="-1" role="dialog" id="meuModal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="modal-body">
                        <div class="tabpanel">
                          <ul class="nav nav-tabs">
                               <li role="presentation" class="nav-link active"><a href="#produtos" aria-controls="produtos" role="tab" data-toggle="tab">Produtos</a>

                               </li>
                               <li role="presentation" class="nav-link"><a href="#adicionar" aria-controls="adicionar" role="tab" data-toggle="tab">Produto Novo</a>

                               </li>
                           </ul>
                           <div class="tab-content">
                        <div class="row tab-pane active" role="tabpanel" id="produtos">
                                <div class="col s12">
                                    <div class="card">
                                        <form method="post" name="meu_form" action="{{route('pedidosCompras.pedidoItem.store', ['pedidoCompra' => $pedidoCompra->id])}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="id" name="id" value="{{ $pedidoItem->id }}" />
                                            <input type="hidden" id="idPedido" name="idPedido" value="{{ $pedidoItem->idPedido }}" />
                                            <div class="row">


                                              <div class="col-lg-6">

                                                <label for="idProduto">Produto</label> <br />
                                                <select id="idProduto" class="form-control input-default " name="idProduto">
                                                  <option value="">Selecione</option>
                                                @foreach($produtos as $produto)

                                                  <option value="{{ $produto->id }}">{{ $produto->id }} - {{ $produto->nome }}</option>
                                                  @endforeach
                                                </select>
                                                <br />


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
                                    <div class="row">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15"href="{{ route('pedidosCompras.show', ['pedidoCompra' => $pedidoCompra->id]) }}">Cancelar</a>
                                    </div>
                                      </form>
                                </div>

                            </div>

                            <!-- ADICIONAR OS PRODUTOS -->
                            <div class="row tab-pane" role="tabpanel" id="adicionar">
                                <div class="col s12">
                                    <div class="card">
                                        <form method="post" name="form_produto" action="" id="adicionarProduto" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                              <div class="col-lg-6">

                                                <div class="input col s4">
                                                    <label for="produtoNovoNome">Nome *</label><br />
                                                    <input class="form-control input-default " type="text" name="produtoNovoNome" id="produtoNovoNome" placeholder="produtoNovoNome" >
                                                </div>
                                                <div class="input col s4">
                                                     <label for="produtoNovoCategoria">Categoria *</label><br />
                                                  <select class="form-control input-default " id="produtoNovoCategoria" required name="produtoNovoCategoria">
                                                    <option value="">Selecione</option>
                                                  @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}"{{$categoria->id ? 'selected' : '' }}>{{ $categoria->descricao }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="input col s4">
                                                     <label for="produtoNovoFornecedor">Fornecedor *</label><br />
                                                  <select class="form-control input-default " id="produtoNovoFornecedor" required name="produtoNovoFornecedor">
                                                    <option value="">Selecione</option>
                                                  @foreach($fornecedores as $fornecedor)
                                                    <option value="{{ $fornecedor->id }}" {{$fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <div class="input col s4">
                                                    <label for="produtoNovoValorUnitario">Valor Unitário *</label><br />
                                                    <input class="form-control input-default " type="text" name="produtoNovoValorUnitario" id="produtoNovoValorUnitario" placeholder="Valor Unitário" >
                                                </div>
                                                <div class="input col s4">
                                                    <label for="produtoNovoValorUnitario">Valor Sugerido Venda *</label><br />
                                                    <input class="form-control input-default " type="text" name="produtoNovoValorSugerido" id="produtoNovoValorSugerido" placeholder="Valor Sugerido" >
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <div class="col-lg-6">
                                                    <label for="quantidade">Quantidade</label><br />
                                                    <input class="form-control input-default " type="text" name="produtoNovoQuantidade" id="produtoNovoQuantidade" min="1" placeholder="Quantidade">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="preco">Valor Total</label><br />
                                                    <input class="form-control input-default " type="text" onBlur="calculo1();" name="produtoNovoPreco" id="produtoNovoPreco">

                                                </div>
                                              </div>
                                            </div>


                                            <div class="row" style="margin-top: 2%">
                                                <button type="submit" id="adicionarProduto" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>

                                            </div>
                                        </form>
                                        <p style="margin-left: 2%">* Campos Obrigatórios</p>
                                    </div>
                                </div>
                            </div>

                          </div>

                          </div>
                    </div>

                      </div>
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
                                  <select class="form-control input-default " readonly required name="situacao">
                                    <option value="">Selecione</option>
                                    <option value="Aberto" <?php if($pedidoCompra->situacao == 'Aberto') {echo 'selected';} ?>selected>Aberto</option>
                                    <option value="Fechado" <?php if($pedidoCompra->situacao == 'Fechado') {echo 'selected';} ?>>Baixado</option>
                                    <option value="Atrasado" <?php if($pedidoCompra->situacao == 'Atrasado') {echo 'selected';} ?>>Atrasado</option>
                                  </select>
                                </div>


                                <div <div class="col-lg-6">
                                  <label for="tipoPagamento">Tipo Documento</label><br />
                                  <select class="form-control input-default "  name="tipoPagamento">

                                    <option value="0" <?php if($pedidoTitulo->tipoPagamento == '0') {echo 'selected';} ?>>Boleto</option>
                                    <option value="1" <?php if($pedidoTitulo->tipoPagamento == '1') {echo 'selected';} ?>>Cartão de Crédito</option>
                                    <option value="2" <?php if($pedidoTitulo->tipoPagamento == '2') {echo 'selected';} ?>>Cartão de Débito</option>
                                    <option value="6" <?php if($pedidoTitulo->tipoPagamento == '6') {echo 'selected';} ?>>Recibo</option>

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
                                    <input class="form-control input-default " type="text" name="preco" id="preco" readonly placeholder="Valor" value="{{ $pedidoCompra->totalpreco }}">
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
      </div><!-- MODAL EXCLUSÃO -->
      <div class="modal" tabindex="-1" role="dialog" id="exclusao">
        <div class="modal-dialog" role="document">
          <div class="modal-content">


              <div class="row">
                  <div class="col-lg-12">
                      <div class="card">
                        <div class="col-lg-12">
                          Deseja realmente excluir a Compra <span id="categoriaDescricao"> </span> {{$pedidoCompra->nome}} ?
                        </div>
                        <form class="col-lg-12" method="post" action="{{ route('pedidosCompras.destroy',['$pedidoCompra' => $pedidoCompra->id])}}">
                            {{ csrf_field() }}
                             <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="id" id="id" value="{{$pedidoCompra->id}}">
                             <div class="col-lg-12">
                                 <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                   <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('pedidosCompras.index') }}">Cancelar</a>
                              </div>
                        </form>

                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>

                      <!-- modal para criação de produtos -->
                      <!--<div class="modalCadastrarProduto" tabindex="-1"  role="dialog" id="modalCadastrarProduto">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">

                              <div class="row">
                                  <div class="col s12">
                                      <div class="card">
                                          <form method="post" action="{{route('produtos.store')}}" enctype="multipart/form-data">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <input type="hidden" id="id" name="id" value="{{ $produto->id }}" />
                                              <div class="row">
                                                <div class="col-lg-6">
                                                  <div class="input col s4">
                                                      <label for="nome">Nome *</label><br />
                                                      <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Nome" value="{{ $produto->nome }}">
                                                  </div>
                                                  <div class="input col s4">
                                                       <label for="categoria">Categoria *</label><br />
                                                    <select class="form-control input-default " required name="categoria">
                                                      <option value="">Selecione</option>
                                                    @foreach($categorias as $categoria)
                                                      <option value="{{ $categoria->id }}"{{$categoria->id ? 'selected' : '' }}>{{ $categoria->descricao }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>

                                                  <div class="input col s4">
                                                       <label for="fornecedor">Fornecedor *</label><br />
                                                    <select class="form-control input-default " required name="fornecedor">
                                                      <option value="">Selecione</option>
                                                    @foreach($fornecedores as $fornecedor)
                                                      <option value="{{ $fornecedor->id }}" {{$fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="input col s4">
                                                      <label for="valorUnitario">Valor Unitário *</label><br />
                                                      <input class="form-control input-default " type="text" name="valorUnitario" id="nome" placeholder="Valor Unitário" value="{{ $produto->valorUnitario }}">
                                                  </div>
                                                  <div class="input col s4">
                                                      <label for="valorSugerido">Valor Sugerido Venda *</label><br />
                                                      <input class="form-control input-default " type="text" name="valorSugerido" id="valorSugerido" placeholder="Valor Sugerido" value="{{ $produto->valorSugerido }}">
                                                  </div>
                                                </div>
                                              </div>


                                              <div class="row" style="margin-top: 2%">
                                                  <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                                  <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('produtos.index') }}">Cancelar</a>
                                                  <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
                                              </div>
                                          </form>
                                          <p style="margin-left: 2%">* Campos Obrigatórios</p>
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
                      </div>-->



@endsection
