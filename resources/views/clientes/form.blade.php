@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" style="background-image: url(http://wsmart.awfranchising.com.br/img/bk.png);">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Clientes</h1>
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
                            <button id="cpfb" class="btn btn-info btn-flat m-b-10 m-l-5" style="margin-left: 2%;">Pessoa Física</button>
                            <button id="cnpjb" class="btn btn-info btn-flat m-b-10 m-l-5">Pessoa Jurídica</button>
                              <form method="post" action="{{route('clientes.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $cliente->id }}" />



                                    <div class="row">
                                      <div class="col-lg-6">
                                    <div id="cpff"  style="display:none">
                                        <label for="cpf">CPF</label><br />
                                        <input class="form-control input-default cpf" id="cpf"  type="text" name="cpf" placeholder="CPF" value="{{ $cliente->cpf }}">
                                    </div>
                                    <div id="cnpjj" >
                                        <label for="cnpj">CNPJ</label><br />
                                        <input class="form-control input-default cnpj" id="cnpj"  type="text" name="cnpj" placeholder="CNPJ" value="{{ $cliente->cnpj }}">
                                    </div>
                                    <div id="razao" >
                                        <label for="razao">Razão Social</label><br />
                                        <input class="form-control input-default " id="razao"  type="text" name="razao" placeholder="Razão Social" value="{{ $cliente->razao }}">
                                    </div>



                                      <div id="nome" >
                                          <label for="nome">Nome *</label><br />
                                          <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Nome" required value="{{ $cliente->nome }}">
                                      </div>
                                      <div id="sobrenome" >
                                          <label for="sobrenome">Sobrenome *</label><br />
                                          <input class="form-control input-default " type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required value="{{ $cliente->sobrenome }}">
                                      </div>
                                      <div >
                                          <label for="telefone">Telefone *</label><br />
                                          <input class="form-control input-default telefone " type="text" name="telefone" id="telefone" required placeholder="telefone" value="{{ $cliente->telefone }}">
                                      </div>
                                      <div >
                                          <label for="nome">E-mail *</label><br />
                                          <input class="form-control input-default " type="text" name="email" id="email" placeholder="Email" required value="{{ $cliente->email }}">
                                      </div>
                                    </div>

                                    <div class="col-lg-6">
                                      <div >
                                          <label for="cidade">Cidade *</label><br />
                                          <input class="form-control input-default " type="text" name="cidade" id="cidade" placeholder="Cidade" required readonly value="{{ $cliente->cidade }}">
                                      </div>
                                      <div >
                                          <label for="estado">Estado *</label><br />
                                          <input class="form-control input-default " type="text" name="estado" id="uf" placeholder="Estado" required readonly value="{{ $cliente->estado }}">
                                      </div>
                                      <div >
                                          <label for="cep">Cep *</label><br />
                                          <input class="form-control input-default " type="text" name="cep" id="cep" placeholder="Cep" required  value="{{ $cliente->cep }}">
                                      </div>
                                      <div >
                                          <label for="bairro">Bairro *</label><br />
                                          <input class="form-control input-default " type="text" name="bairro" id="bairro" placeholder="Bairro" required readonly value="{{ $cliente->bairro }}">
                                      </div>
                                      <div >
                                          <label for="numero">Numero *</label><br />
                                          <input class="form-control input-default " id="numero" type="text" name="numero" id="numero" placeholder="Numero" required value="{{ $cliente->numero }}">
                                      </div>
                                      <div class="input col s5">
                                           <label for="status">Status *</label><br />
                                        <select class="form-control" required name="status">
                                          <option value="Ativo">Ativo</option>
                                          <option value="Inativo">Inativo</option>
                                        </select>
                                      </div>

                                  </div>
                                  </div>
                                    <p style="margin-left: 2%">* Campos Obrigatórios</p>

                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('clientes.index') }}">Cancelar</a>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
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


        <!-- MODAL EXCLUSÃO -->
        <div class="modal" tabindex="-1" role="dialog" id="meuModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          <div class="col-lg-12">
                            Deseja realmente excluir o Cliente <span id="categoriaDescricao"> </span> {{$cliente->nome}} ?
                          </div>
                          <form class="col-lg-12" method="post" action="{{ route('clientes.destroy',['$cliente' => $cliente->id])}}">
                              {{ csrf_field() }}
                               <input type="hidden" name="_method" value="DELETE">
                               <input type="hidden" name="id" id="id" value="{{$cliente->id}}">
                               <div class="col-lg-12">
                                   <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                     <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('clientes.index') }}">Cancelar</a>
                                </div>
                          </form>

                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>

@endsection
