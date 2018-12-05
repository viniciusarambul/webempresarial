@extends('templates.template', [
    'title'=> 'usuarios',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folder',
    'active_router'=> 'usuarios'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
          Cadastro de Usuarios
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('usuarios.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $usuario->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="nome">Nome *</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Descrição" value="{{ $usuario->nome }}">
                    </div>
                    <div class="input col s6">
                        <label for="email">E-mail *</label><br />
                        <input type="text" name="email" id="email" placeholder="Descrição" value="{{ $usuario->email }}">
                    </div>
                    <div class="input col s6">
                        <label for="login">Login *</label><br />
                        <input type="text" name="login" id="login" placeholder="Descrição" value="{{ $usuario->login }}">
                    </div>
                    <div class="input col s6">
                        <label for="senha">Senha *</label><br />
                        <input type="text" name="senha" id="senha" placeholder="Descrição" value="{{ $usuario->senha }}">
                    </div>
                    <div class="input col s4">
                         <label for="grupo_id">Grupo *</label><br />
                      <select class="browser-default" required name="grupo_id">
                        <option value="">Selecione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Secretário(a)</option>
                        <option value="3">Gerente</option>

                      </select>
                    </div
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('usuarios.index') }}">Cancelar</a>
                </div>
            </form>
            <div class="row">
              <div class="col s3"></div>
              <div class="col s6">
                <ul class="collapsible">
                  <li>
                    <div class="collapsible-header">Administrador</div>
                    <div class="collapsible-body"><span style="margin-left: 5%">Acesso total ao sistema</span></div>
                  </li>
                  <li>
                    <div class="collapsible-header">Secretário(a)</div>
                    <div class="collapsible-body"><span style="margin-left: 5%">Acesso a toda a parte de cadastros de clientes, fornecedores, vendedores, categorias e produtos.</span></div>
                  </li>
                  <li>
                    <div class="collapsible-header">Gerente</div>
                    <div class="collapsible-body"><span style="margin-left: 5%">Acesso a todos os cadastros inclusos no tipo secretário e incluindo pedidos de compras, vendas e titulos </span></div>
                  </li>
                </ul>
              </div>
              <div class="col s3"></div>
            </div>
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
var elems = document.querySelectorAll('.collapsible');
var instances = M.Collapsible.init(elems, options);
});
</script>

@endsection
