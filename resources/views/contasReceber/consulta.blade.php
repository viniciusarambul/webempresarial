@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <section id="main-content">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="card">
                                    <div class="card-content" >
                                      <form class="row no-margin-bottom" target="_blank" method="GET" action="{{ route('contasReceber.relatorio') }}">
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <h1 style="text-align: center">Filtro Rel. Contas Receber</h1>
                                          </div>
                                          <div class=" col-lg-6">
                                            <h5 style="text-align: center">Data de Vencimento</h5>
                                            <div class="input col-lg-6">
                                                <label for="data_inicial">De</label>
                                                <input class="form-control input-default"  type="date" name="data_incial" id="data_inicial" >
                                            </div>
                                            <div class="input col-lg-6">
                                                <label for="data_final">Até</label>
                                                <input class="form-control input-default" type="date" name="data_final" id="data_final" >
                                            </div>
                                          </div>
                                          <div class="col-lg-6">
                                          <div class="input col-lg-6">
                                            <h5 style="text-align: center">Situação</h5>
                                            <select class="form-control input-default"  name="situacao">
                                              <option value="">Todos</option>
                                              <option value="0" >Aberto</option>
                                              <option value="1" >Pago</option>

                                            </select>
                                          </div>
                                          <div class="input col-lg-6">
                                            <h5 style="text-align: center">Cliente</h5>
                                            <select class="form-control input-default"  name="cliente">
                                              <option value="">Todos</option>
                                              @foreach($clientes as $cliente)
                                              <option value="{{$cliente->id}}" >{{$cliente->nome}}</option>
                                              @endforeach

                                            </select>
                                          </div>
                                          <div class="input col-lg-6">
                                            <h5 style="text-align: center">Tipo Pagamento</h5>
                                            <select class="form-control input-default"  name="pagamento">
                                              <option value="">Todos</option>
                                              <option value="0">Boleto</option>
                                              <option value="1">Cartão de Crédio</option>
                                              <option value="2">Cartão de Débito</option>
                                              <option value="6">Recibo</option>


                                            </select>
                                          </div>
                                        </div>

                                        </div>

                                      <div class="row">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Consultar</button>
                                      </div>
                                </form>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>

@endsection
