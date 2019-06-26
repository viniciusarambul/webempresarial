@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Pedidos de Vendas</h1>
                          </div>
                      </div>
                  </div>

                </div>
                <!-- /# row -->
                <section id="main-content">
                  <div class="row">
                      <div class="col s12">
                          <div class="card">
                              <form method="post" action="{{route('pedidosVendas.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $pedidoVenda->id }}" />
                                  <div class="row">

                                      <div class="col-lg-3">
                                          <label for="data">Data *</label><br />
                                          <input class="form-control input-default " type="date" name="data" id="data" required placeholder="Data" value="{{ $pedidoVenda->data }}">
                                      </div>
                                      <div class="col-lg-3">
                                           <label for="situacao">Situação *</label><br />
                                        <select class="form-control input-default " readonly name="situacao">
                                          <option value="">Selecione</option>
                                          <option value="0" <?php if($pedidoVenda->situacao == 0) {echo 'selected';} ?>>Aberto</option>
                                          <option value="1" <?php if($pedidoVenda->situacao == 1) {echo 'selected';} ?>>Faturado</option>
                                          <option value="2" <?php if($pedidoVenda->situacao == 2) {echo 'selected';} ?>>Cancelado</option>
                                        </select>

                                      </div>
                                      <div class="col-lg-3">
                                        <label for="idCliente">Cliente</label><br />
                                        <select class="form-control input-default " name="idCliente">
                                        @foreach($clientes as $cliente)
                                          <option value="{{ $cliente->id }}">{{ $cliente->id }} - {{ $cliente->nome }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-lg-3">
                                        <label for="idVendedor">Vendedor</label><br />
                                        <select class="form-control input-default " name="idVendedor">
                                        @foreach($vendedores as $vendedor)
                                          <option value="{{ $vendedor->id }}">{{ $vendedor->id }} - {{ $vendedor->nome }}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                    </div>


                                    <p style="margin-left: 2%">* Campos Obrigatórios</p>

                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('pedidosVendas.index') }}">Cancelar</a>
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
