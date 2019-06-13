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
                                      <form target="_blank" method="GET" action="{{ route('contasPagar.relatorio') }}">
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <h1 style="text-align: center">Filtro Rel. Contas Pagar</h1>
                                          </div>
                                          <div class=" col-lg-12">
                                            <h3 style="text-align: center">Data de Emissão</h3>
                                            <div class="input col-lg-6">
                                                <label for="data_inicial">De</label>
                                                <input class="form-control input-default " type="date" name="data_incial" id="data_inicial" >

                                          </div>
                                          <div class=" col-lg-6">
                                            <div class="input col-lg-6">
                                                <label for="data_final">Até</label>
                                                <input class="form-control input-default " type="date" name="data_final" id="data_final" >
                                            </div>
                                          </div>

                                          <div class="input col-lg-6">
                                            <h3 style="text-align: center">Situação</h3>
                                            <select class="form-control input-default " name="situacao">
                                              <option value="">Selecione</option>
                                              <option value="0" >Aberto</option>
                                              <option value="1" >Fechado</option>
                                              <option value="2" >Cancelado</option>
                                            </select>
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
