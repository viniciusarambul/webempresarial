@extends('templates.template', [
    'title'=> 'clientes',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-truck',
    'active_router'=> 'clienes'
])
@section('container')



<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Clientes
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
          <button id="cpfb" class="waves-effect waves-green btn teal right" style="margin-left: 2%;">CPF</button>
          <button id="cnpjb" class="waves-effect waves-green btn teal right">CNPJ</button>
            <form method="post" action="{{route('clientes.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $cliente->id }}" />
                <div class="row">


                  <div>
                  <div id="cpff" class="input col s6" style="display:none">
                      <label for="cpf">CPF</label><br />
                      <input class="cpf" id="cpf"  type="text" name="cpf" placeholder="CPF" value="{{ $cliente->cpf }}">
                  </div>
                  <div id="cnpjj" class="input col s6">
                      <label for="cnpj">CNPJ</label><br />
                      <input class="cnpj" id="cnpj"  type="text" name="cnpj" placeholder="CNPJ" value="{{ $cliente->cnpj }}">
                  </div>




                    <div class="input col s6">
                        <label for="nome">Nome</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $cliente->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="sobrenome">Sobrenome</label><br />
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="{{ $cliente->sobrenome }}">
                    </div>
                    <div class="input col s6">
                        <label for="telefone">Telefone</label><br />
                        <input class="telefone" type="text" name="telefone" id="telefone" placeholder="telefone" value="{{ $cliente->telefone }}">
                    </div>
                    <div class="input col s6">
                        <label for="nome">E-mail</label><br />
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ $cliente->email }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input col s6">
                        <label for="cidade">Cidade</label><br />
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{ $cliente->cidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="estado">Estado</label><br />
                        <input type="text" name="estado" id="estado" placeholder="Estado" value="{{ $cliente->estado }}">
                    </div>
                    <div class="input col s6">
                        <label for="cep">Cep</label><br />
                        <input  class="cep" type="text" name="cep" id="cep" placeholder="Cep" value="{{ $cliente->cep }}">
                    </div>
                    <div class="input col s6">
                        <label for="bairro">Bairro</label><br />
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{ $cliente->bairro }}">
                    </div>
                    <div class="input col s6">
                        <label for="numero">Numero</label><br />
                        <input id="numero" type="text" name="numero" id="numero" placeholder="Numero" value="{{ $cliente->numero }}">
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('clientes.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
