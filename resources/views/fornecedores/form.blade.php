@extends('templates.template', [
    'title'=> 'fornecedores',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-truck',
    'active_router'=> 'fornecedores'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Fornecedores
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('fornecedores.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $fornecedor->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="nome">Nome</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $fornecedor->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="sobrenome">Sobrenome</label><br />
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="{{ $fornecedor->sobrenome }}">
                    </div>
                    <div class="input col s6">
                        <label for="telefone">Telefone</label><br />
                        <input type="text" name="telefone" id="telefone" placeholder="telefone" value="{{ $fornecedor->telefone }}">
                    </div>
                    <div class="input col s6">
                        <label for="nome">E-mail</label><br />
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ $fornecedor->email }}">
                    </div>
                    <div class="input col s6">
                        <label for="cpf">CPF</label><br />
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ $fornecedor->cpf }}">
                    </div>
                    <div class="input col s6">
                        <label for="cnpj">CNPJ</label><br />
                        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ $fornecedor->cnpj }}">
                    </div>
                    <div class="input col s6">
                        <label for="razaosocial">Razão Social</label><br />
                        <input type="text" name="razaosocial" id="razaosocial" placeholder="Razão Social" value="{{ $fornecedor->razaosocial }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input col s6">
                        <label for="cidade">Cidade</label><br />
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{ $fornecedor->cidade }}">
                    </div>
                    <div class="input col s6">
                        <label for="estado">Estado</label><br />
                        <input type="text" name="estado" id="estado" placeholder="Estado" value="{{ $fornecedor->estado }}">
                    </div>
                    <div class="input col s6">
                        <label for="cep">Cep</label><br />
                        <input type="text" name="cep" id="cep" placeholder="Cep" value="{{ $fornecedor->cep }}">
                    </div>
                    <div class="input col s6">
                        <label for="bairro">Bairro</label><br />
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{ $fornecedor->bairro }}">
                    </div>
                    <div class="input col s6">
                        <label for="numero">Numero</label><br />
                        <input type="text" name="numero" id="numero" placeholder="Numero" value="{{ $fornecedor->numero }}">
                    </div>



                </div>

                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('fornecedores.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
