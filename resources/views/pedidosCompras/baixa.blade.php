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

                  <div class="row no-margin-bottom">
                      <div class="col s12">
                          <h4>
                              Nome: {{ $pedidoCompra->nome }}
                          </h4>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col s12 m4">
                          <div class="card">
                              <h5>Dados do Pedido</h5>
                              <p><b>Nome: </b>{{ $pedidoCompra->nome }}</p>
                              <p><b>Data: </b>{{ $pedidoCompra->data }}</p>
                              <p><b>Situacao: </b>{{ $pedidoCompra->situacao_descricao }}</p>
                              <p><b>Valor Pedido: </b>{{ $pedidoCompra->valor }}</p>

                          </div>
                      </div>

                  </div>
                  <div class="row">
                  <form method="get" action="{{route('pedidosCompras.store')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id" name="id" value="{{ $pedidoCompra->id }}" />
                    <div class="col s12">
                      <div class="input col s4">
                           <label for="situacao">Situação *</label><br />
                        <select class="browser-default" required name="situacao">
                          <option value="" >Selecione</option>
                          <option value="0" <?php if($pedidoCompra->situacao == 0) {echo 'selected';} ?>>Aberto</option>
                          <option value="1" <?php if($pedidoCompra->situacao == 1) {echo 'selected';} ?>>Fechado</option>
                          <option value="2" <?php if($pedidoCompra->situacao == 2) {echo 'selected';} ?>>Cancelado</option>
                        </select>
                      </div>

                      <div class="input col s6">
                          <label for="valorPago">Valor Pago </label><br />
                          <input type="text" name="valorPago" id="valorPago" min="0" value="{{ $pedidoCompra->valorPago }}">
                      </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                        <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosCompras.index') }}">Cancelar</a>
                    </div>
                  </form>
                  </div>
                </section>
              </div>
            </div>
          </div>


@endsection
