@extends('templates.template', [
    'title'=> 'Contas Pagar',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-account',
    'active_router'=> 'relatorios'
])
@section('container')

<
<div class="row">
    <div class="col s12">
        <div class="card">
          <div class="card-content" >
            <form class="row no-margin-bottom" target="_blank" method="GET" action="{{ route('contasReceber.relatorio') }}">
              <div class="row">
                <div class="col s12">
                  <h1 style="text-align: center">Filtro Rel. Contas Receber</h1>
                </div>
                <div class=" col s6">
                  <h3 style="text-align: center">Data de Emissão</h3>
                  <div class="input col s6">
                      <label for="data_inicial">De</label>
                      <input type="date" name="data_incial" id="data_inicial" >
                  </div>
                  <div class="input col s6">
                      <label for="data_final">Até</label>
                      <input type="date" name="data_final" id="data_final" >
                  </div>
                </div>

                <div class="input col s6">
                  <h3 style="text-align: center">Situação</h3>
                  <select class="browser-default" name="situacao">
                    <option value="">Selecione</option>
                    <option value="0" >Aberto</option>
                    <option value="1" >Fechado</option>
                    <option value="2" >Cancelado</option>
                  </select>
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
