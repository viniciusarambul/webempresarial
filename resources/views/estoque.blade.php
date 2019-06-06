@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">
                        <div class="row">

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
                                      Estoque
                                  </h4>
                              </div>
                          </div>


                          <div class="row">
                              <div class="col s12">

                                  <div class="card">
                                      @if(count($produtos))
                                      <table>
                                          <thead>
                                              <tr>
                                                  <th>Produto</th>
                                                  <th>Categoria</th>
                                                  <!-- <th>Valor</th> -->
                                                  <th>Fornecedor</th>
                                                  <th style="text-align: center">Quantidade</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              @foreach($produtos as $produto)
                                              <tr class="with-options">
                                                  <td>{{$produto->nome}}</td>
                                                  <td>{{$produto->categorias->descricao}}</td>
                                                  <!-- <td>{{$produto->valorUnitario}}</td> -->
                                                  <td>{{$produto->fornecedores->nome}}</td>
                                                  <td style="text-align: center">{{$produto->quantidade}}</td>


                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                      @else
                                      <p class="alert-disable">Não há Produtos cadastrados.</p>
                                      @endif
                                  </div>
                              </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>


@endsection
