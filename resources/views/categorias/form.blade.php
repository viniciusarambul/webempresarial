@extends('templates.template', [
    'title'=> 'categorias',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-folder',
    'active_router'=> 'categorias'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
          Cadastro de Categorias
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('categorias.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $categoria->id }}" />
                <div class="row">
                    <div class="input col s6">
                        <label for="descricao">Descriçao *</label><br />
                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $categoria->descricao }}">
                    </div>
                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('categorias.index') }}">Cancelar</a>
                </div>
            </form>
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>

@endsection
