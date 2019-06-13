@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <section id="main-content">
                          <div class="row">
                              <div class="col s12">
                                  <div class="card">
                                    <div class="card-content" >
                                      <form class="row no-margin-bottom" target="_blank" method="GET" action="{{ route('pedidosVendas.relatorio') }}">
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <h1 style="text-align: center">Filtro Rel. Pedidos Vendas</h1>
                                            <h3 style="text-align: center">Data de Emissão</h3>
                                          </div>
                                          <div class=" col-lg-6">

                                            <div class="input col-lg-8">
                                                <label for="data_inicial">De</label>
                                                <input class="form-control input-default" type="date" required name="data_incial" id="data_inicial" >
                                            </div>
                                          </div>
                                            <div class=" col-lg-6">
                                            <div class="input col-lg-8">
                                                <label for="data_final">Até</label>
                                                <input class="form-control input-default" type="date" required name="data_final" id="data_final" >
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
