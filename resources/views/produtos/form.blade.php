@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Produtos</h1>
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
                              <form method="post" action="{{route('produtos.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $produto->id }}" />
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="input col s4">
                                          <label for="nome">Nome *</label><br />
                                          <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Nome" value="{{ $produto->nome }}">
                                      </div>
                                      <div class="input col s4">
                                           <label for="categoria">Categoria *</label><br />
                                        <select class="form-control input-default " required name="categoria">
                                          <option value="">Selecione</option>
                                        @foreach($categorias as $categoria)
                                          <option value="{{ $categoria->id }}"{{$categoria->id ? 'selected' : '' }}>{{ $categoria->descricao }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="input col s6" style="display:none">
                                          <label for="valorUnitario">Valor Unitário *</label><br />
                                          <input class="form-control input-default " type="hidden" name="valorUnitario" id="valor" min="0" placeholder="Valor unitario" value="{{ $produto->valorUnitario }}">
                                      </div>
                                      <div class="input col s4">
                                           <label for="fornecedor">Fornecedor *</label><br />
                                        <select class="form-control input-default " required name="fornecedor">
                                          <option value="">Selecione</option>
                                        @foreach($fornecedores as $fornecedor)
                                          <option value="{{ $fornecedor->id }}" {{$fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>


                                  <div class="row" style="margin-top: 2%">
                                      <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                      <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('produtos.index') }}">Cancelar</a>
                                      <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
                                  </div>
                              </form>
                              <p style="margin-left: 2%">* Campos Obrigatórios</p>
                          </div>
                      </div>
                  </div>
                </section>
              </div>
            </div>
          </div>

          <!-- MODAL EXCLUSÃO -->
          <div class="modal" tabindex="-1" role="dialog" id="meuModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card">
                            <div class="col-lg-12">
                              Deseja realmente excluir o Produto <span id="categoriaDescricao"> </span> {{$produto->nome}} ?
                            </div>
                            <form class="col-lg-12" method="post" action="{{ route('produtos.destroy',['$produto' => $produto->id])}}">
                                {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="id" id="id" value="{{$produto->id}}">
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                       <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('produtos.index') }}">Cancelar</a>
                                  </div>
                            </form>

                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>

@endsection
