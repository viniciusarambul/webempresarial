@extends('templates.template-v2', [
'title' => $permissao->id ? 'Editar permissão' : 'Criar permissão',
'breadcrumb' => [
'permissoes.index' => 'Permissões',
'permissoes.create' => $permissao->id ? 'Editar' : 'Novo',
]
])

@section('container')


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <form method="post" action="{{route('permissoes.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id" name="id" value="{{ $permissao->id }}" />

                    <div class="row">
                        <div class="col s12">
                            <h6>Dados de exibição</h6>
                            <p class="grey-text">Informações que aparecerão nos menus.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <label for="titulo">Titulo</label>
                            <input type="text" name="titulo" id="titulo" value="{{ $permissao->titulo }}">
                        </div>
                        <div class="input-field col s4">
                            <p class="grey-text">Visivel</p>
                            <div class="switch">
                                <label>
                                    Não
                                    <input type="checkbox" name="visivel" {{ $permissao->visivel ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Sim
                                </label>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <label for="ordem">Ordem</label>
                            <input type="number" name="ordem" id="ordem" value="{{ $permissao->ordem }}">
                        </div>
                        <div class="input-field col s6">
                            <label for="icone">Icone (<a href="http://materialdesignicons.com" target="_blank">Lista de icones disponíveis</a>)</label>
                            <input type="text" name="icone" id="icone" value="{{ $permissao->icone }}">
                        </div>
                        <div class="input-field col s12">
                            <label for="descricao">Descrição</label>
                            <textarea class="materialize-textarea" name="descricao" id="descricao">{{ $permissao->descricao }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <h6>Dados de identificação</h6>
                            <p class="grey-text">Informações de verificação pelo sistema.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <label for="route">Rota</label>
                            <input type="text" name="route" id="route" value="{{ $permissao->route }}">
                        </div>
                        <div class="input-field col s6">
                            <select name="menu_id" id="menu_id">
                                <option disabled selected>Selecione uma opção</option>
                                @foreach($menus as $menu)
                                  <option value="{{ $menu->id }}" {{ $permissao->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->titulo }}</option>
                                @endforeach
                            </select>
                            <label for="descricao">Permissão pai</label>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                        <a class="waves-effect waves-green btn-flat right" href="{{ route('grupos.index') }}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
