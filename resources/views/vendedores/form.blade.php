@extends('templates.template', [
    'title'=> 'vendedores',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-truck',
    'active_router'=> 'clienes'
])
@section('container')

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/vendor/artesaos/cidades/js/scripts.js"></script>

<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Cadastro de Vendedor
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
          <button id="cpfb" class="waves-effect waves-green btn teal center" style="margin-left: 2%;">Pessoa Física</button>
          <button id="cnpjb" class="waves-effect waves-green btn teal center">Pessoa Jurídica</button>
            <form method="post" action="{{route('vendedores.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $vendedor->id }}" />
                <div class="row">



                  <div id="cpff" class="input col s6" style="display:none">
                      <label for="cpf">CPF</label><br />
                      <input class="cpf" id="cpf"  type="text" name="cpf" placeholder="CPF" value="{{ $vendedor->cpf }}">
                  </div>
                  <div id="cnpjj" class="input col s6">
                      <label for="cnpj">CNPJ</label><br />
                      <input class="cnpj" id="cnpj"  type="text" name="cnpj" placeholder="CNPJ" value="{{ $vendedor->cnpj }}">
                  </div>
                  <div id="razao" class="input col s6">
                      <label for="razao">Razão Social</label><br />
                      <input class="razao" id="razao"  type="text" name="razao" placeholder="Razão Social" value="{{ $vendedor->razao }}">
                  </div>

                  <div class="input col s5">
                       <label for="status">Status *</label><br />
                    <select class="browser-default" required name="status">
                      <option value="Ativo">Ativo</option>
                      <option value="Inativo">Inativo</option>
                    </select>
                  </div>

                    <div class="input col s6">
                        <label for="nome">Nome *</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" required value="{{ $vendedor->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="sobrenome">Sobrenome *</label><br />
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required value="{{ $vendedor->sobrenome }}">
                    </div>
                    <div class="input col s6">
                        <label for="telefone">Telefone *</label><br />
                        <input class="telefone" type="text" name="telefone" id="telefone" required placeholder="telefone" value="{{ $vendedor->telefone }}">
                    </div>
                    <div class="input col s6">
                        <label for="nome">E-mail *</label><br />
                        <input type="text" name="email" id="email" placeholder="Email" required value="{{ $vendedor->email }}">
                    </div>

                  <div class="row">
                    <div class="input col s6">
                        <label for="cidade">Cidade *</label><br />
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required value="{{ $vendedor->cidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="estado">Estado *</label><br />
                        <input type="text" name="estado" id="estado" placeholder="Estado" required value="{{ $vendedor->estado }}">
                    </div>
                    <div class="input col s6">
                        <label for="cep">Cep *</label><br />
                        <input  class="cep" type="text" name="cep" id="cep" placeholder="Cep" required value="{{ $vendedor->cep }}">
                    </div>
                    <div class="input col s6">
                        <label for="bairro">Bairro *</label><br />
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" required value="{{ $vendedor->bairro }}">
                    </div>
                    <div class="input col s6">
                        <label for="numero">Numero *</label><br />
                        <input id="numero" type="text" name="numero" id="numero" placeholder="Numero" required value="{{ $vendedor->numero }}">
                    </div>

                </div>
                  <p style="margin-left: 2%">* Campos Obrigatórios</p>

                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('vendedores.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
     $('#uf').ufs({
         onChange: function(uf){
             $('#cidade').cidades({uf: uf});
         }
     });
  </script>
@endsection
