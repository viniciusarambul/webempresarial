@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro do Titulo</h1>
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
                </section>
              </div>
            </div>
          </div>


@endsection
