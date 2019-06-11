@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Categorias</h1>
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
                              <form method="post" action="{{route('categorias.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $categoria->id }}" />
                                  <div class="row">
                                      <div class="input col s6">
                                          <label for="descricao">Descriçao *</label><br />
                                          <input type="text" class="form-control input-default " name="descricao" id="descricao" placeholder="Descrição" value="{{ $categoria->descricao }}">
                                      </div>
                                    </div>


                                  <div class="row" style="margin-top: 2%">
                                      <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                      <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('categorias.index') }}">Cancelar</a>
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
                              Deseja realmente excluir a Categoria <span id="categoriaDescricao"> </span> {{$categoria->descricao}} ?
                            </div>
                            <form class="col-lg-12" method="post" action="{{ route('categorias.destroy',['$categoria' => $categoria->id])}}">
                                {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="id" id="id" value="{{$categoria->id}}">
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                       <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('categorias.index') }}">Cancelar</a>
                                  </div>
                            </form>

                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>

@endsection
