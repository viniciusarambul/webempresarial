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
                                      <form class="row no-margin-bottom" target="_blank" method="GET" action="{{ route('produtos.relatorio') }}">
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <h1 style="text-align: center">Filtro Rel. Produtos</h1>
                                          </div>
                                          <div class="col-lg-6">

                                            <div class="input col-lg-12" >
                                              <label for="fornecedor">Fornecedor *</label><br />
                                              <select class="form-control input-default" name="fornecedor">
                                                    <option value="">Selecione</option>
                                              @foreach($produtos as $cliente)

                                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                              <div class="col-lg-12">
                                                <label for="nome">Nome:</label>
                                                <input class="form-control input-default " type="text" name="nome" id="nome" >
                                              </div>

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
