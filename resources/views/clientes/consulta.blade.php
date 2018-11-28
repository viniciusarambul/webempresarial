@extends('templates.template', [
    'title'=> 'clientes',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'clientes'
])
@section('container')

<div class="row">
    <div class="col s12">
        <div class="card">
          <div class="card-content" >
            <form class="row no-margin-bottom" target="_blank" method="GET" action="{{ route('clientes.relatorio') }}">
              <div class="row">
                <div class="input col s6">
                    <label for="data_inicial">De</label>
                    <input type="date" name="data_incial" id="data_inicial" >
                </div>
                <div class="input col s6">
                    <label for="data_final">Até</label>
                    <input type="date" name="data_final" id="data_final" >
                </div>
              </div>

            <div class="row">
              <button type="submit"  class="waves-effect waves-green btn teal right">Consultar</button>
            </div>
      </form>
          </div>
        </div>
    </div>
</div>


@endsection
