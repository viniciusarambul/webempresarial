@extends('templates.layout')
@section('content-wrap')
<link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <div class="content-wrap">
                <div class="main">
                    <div class="container-fluid">

                        <section id="main-content">


                          <div class="row">
                              <div class="col s12">

                                  <div class="card table-responsive">
                                    <h4>Estoque de Produtos</h4>
                                      @if(count($produtos))
                                      <table class="table table-bordered">
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
                                                  <td style="text-align: center">{{isset($produto->quantidade) ? $produto->quantidade : '0'}}</td>


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
