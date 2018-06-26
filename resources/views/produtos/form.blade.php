@extends('templates.template', [
    'title'=> 'produtos',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folder',
    'active_router'=> 'produtos'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Produtos
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('produtos.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $produto->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="nome">Nome *</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $produto->nome }}">
                    </div>
                    <div class="input col s4">
                         <label for="categoria">Categoria *</label><br />
                      <select class="browser-default" name="categoria">
                        <option value="">Selecione</option>
                      @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input col s6">
                        <label for="valorUnitario">Valor Unitário *</label><br />
                        <input type="text" name="valorUnitario" id="valor" placeholder="Valor unitario" value="{{ $produto->valorUnitario }}">
                    </div>
                    <div class="input col s4">
                         <label for="fornecedor">Fornecedor *</label><br />
                      <select class="browser-default" name="fornecedor">
                        <option value="">Selecione</option>
                      @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('produtos.index') }}">Cancelar</a>
                </div>
            </form>
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>

@endsection
