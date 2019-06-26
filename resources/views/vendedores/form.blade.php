@extends('templates.layout')
@section('content-wrap')

<div class="content-wrap">
        <div class="main" >
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Cadastro de Vendedores</h1>
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
                              <form method="post" action="{{route('vendedores.store')}}" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" id="id" name="id" value="{{ $vendedor->id }}" />
                                  <div class="row">


                                    <div class="col-lg-6">
                                    <div id="cpff" class="input col s6" style="display:none">
                                        <label for="cpf">CPF</label><br />
                                        <input class="form-control input-default " id="cpf"  type="text" name="cpf" placeholder="CPF" value="{{ $vendedor->cpf }}">
                                    </div>
                                    <div id="cnpjj" class="input col s6">
                                        <label for="cnpj">CNPJ</label><br />
                                        <input class="form-control input-default " id="cnpj"  type="text" name="cnpj" placeholder="CNPJ" value="{{ $vendedor->cnpj }}">
                                    </div>
                                    <div id="razao" class="input col s6">
                                        <label for="razao">Razão Social</label><br />
                                        <input class="form-control input-default " id="razao"  type="text" name="razao" placeholder="Razão Social" value="{{ $vendedor->razao }}">
                                    </div>



                                      <div id="nome" class="input col s6">
                                          <label for="nome">Nome *</label><br />
                                          <input class="form-control input-default " type="text" name="nome" id="nome" placeholder="Nome" required value="{{ $vendedor->nome }}">
                                      </div>
                                      <div id="sobrenome" class="input col s6">
                                          <label for="sobrenome">Sobrenome *</label><br />
                                          <input class="form-control input-default " type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required value="{{ $vendedor->sobrenome }}">
                                      </div>
                                      <div class="input col s6">
                                          <label for="telefone">Telefone *</label><br />
                                          <input class="form-control input-default " type="text" name="telefone" id="telefone" required placeholder="telefone" value="{{ $vendedor->telefone }}">
                                      </div>
                                      <div class="input col s6">
                                          <label for="nome">E-mail *</label><br />
                                          <input class="form-control input-default " type="text" name="email" id="email" placeholder="Email" required value="{{ $vendedor->email }}">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">

                                      <div class="input col s6">
                                          <label for="cidade">Cidade *</label><br />
                                          <input class="form-control input-default " type="text" readonly name="cidade" id="cidade" placeholder="Cidade" required value="{{ $vendedor->cidade }}">
                                      </div>
                                      <div class="input col s6">
                                          <label for="estado">Estado *</label><br />
                                          <input class="form-control input-default " type="text" name="estado" readonly id="uf" placeholder="Estado" required value="{{ $vendedor->estado }}">
                                      </div>
                                      <div class="input col s6">
                                          <label for="cep">Cep *</label><br />
                                          <input  class="form-control input-default " type="text" name="cep" id="cep" placeholder="Cep" required value="{{ $vendedor->cep }}">
                                      </div>
                                      <div class="input col s6">
                                          <label for="bairro">Bairro *</label><br />
                                          <input class="form-control input-default " type="text" name="bairro" id="bairro" readonly placeholder="Bairro" required value="{{ $vendedor->bairro }}">
                                      </div>
                                      <div class="input col s6">
                                          <label for="numero">Numero *</label><br />
                                          <input class="form-control input-default " id="numero" type="text" name="numero" id="numero" placeholder="Numero" required value="{{ $vendedor->numero }}">
                                      </div>
                                      <div class="input col s5">
                                           <label for="status">Status *</label><br />
                                        <select class="form-control input-default " required name="status">
                                          <option value="Ativo">Ativo</option>
                                          <option value="Inativo">Inativo</option>
                                        </select>
                                      </div>


                                </div>
                              </div>
                                    <p style="margin-left: 2%">* Campos Obrigatórios</p>

                                    <div class="row" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                                        <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('vendedores.index') }}">Cancelar</a>
                                    </div>
                              </form>
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
                              Deseja realmente excluir o Vendedor <span id="categoriaDescricao"> </span> {{$vendedor->nome}} ?
                            </div>
                            <form class="col-lg-12" method="post" action="{{ route('vendedores.destroy',['$vendedor' => $vendedor->id])}}">
                                {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="id" id="id" value="{{$vendedor->id}}">
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                       <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('vendedores.index') }}">Cancelar</a>
                                         <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
                                  </div>
                            </form>

                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>

@endsection
