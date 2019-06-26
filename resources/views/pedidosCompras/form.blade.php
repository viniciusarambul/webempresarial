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

                </div>
                <!-- /# row -->
                <section id="main-content">
                  <div class="row">
                      <div class="col s12">
                          <div class="card">
                              <form method="post" action="{{route('pedidosCompras.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $pedidoCompra->id }}" />
                                  <div class="row">
                                      <!--<div class="col-lg-6">
                                          <label for="nome">Descrição *</label><br />
                                          <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Descrição" required value="{{ $pedidoCompra->nome }}">
                                      </div>-->
                                      <div class="col-lg-3">
                                          <label for="data">Data *</label><br />
                                          <input class="form-control input-default " type="date" name="data" id="data" required placeholder="Data" value="{{ $pedidoCompra->data }}">
                                      </div>
                                      <div class="col-lg-3">
                                           <label for="situacao">Situação *</label><br />
                                        <select class="form-control input-default " readonly name="situacao">
                                          <option value="">Selecione</option>
                                          <option value="0" <?php if($pedidoCompra->situacao == 0) {echo 'selected';} ?>>Aberto</option>
                                          <option value="1" <?php if($pedidoCompra->situacao == 1) {echo 'selected';} ?>>Fechado</option>
                                          <option value="2" <?php if($pedidoCompra->situacao == 2) {echo 'selected';} ?>>Cancelado</option>
                                        </select>

                                      </div>
                                      <div class="col-lg-6">
                                        <label for="idFornecedor">Fornecedor</label><br />
                                        <select class="form-control input-default " name="idFornecedor">
                                        @foreach($fornecedores as $fornecedor)
                                          <option value="{{ $fornecedor->id }}">{{ $fornecedor->id }} - {{ $fornecedor->nome }}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                    </div>


                                    <p style="margin-left: 2%">* Campos Obrigatórios</p>

                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('pedidosCompras.index') }}">Cancelar</a>
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
