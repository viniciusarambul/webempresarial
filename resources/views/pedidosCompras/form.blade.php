@extends('templates.template', [
    'title'=> 'Pedido Compra',
    'prev_router'=> 'home',
    'icon'=> 'mdi mdi-briefcase',
    'active_router'=> 'pedidosCompras'
])
@section('container')


<div class="row no-margin-bottom">
    <div class="col s12">
        <h4>
            Pedido Compra
        </h4>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <form method="post" action="{{route('pedidosCompras.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $pedidoCompra->id }}" />
                <div class="row">
                    <div class="input col s3">
                        <label for="nome">Descrição *</label><br />
                        <input type="text" name="nome" id="nome" placeholder="Descrição" value="{{ $pedidoCompra->nome }}">
                    </div>
                    <div class="input col s3">
                        <label for="data">Data *</label><br />
                        <input type="date" name="data" id="data" required placeholder="Data" value="{{ $pedidoCompra->data }}">
                    </div>
                    <div class="input col s3">
                         <label for="situacao">Situação *</label><br />
                      <select class="browser-default" required name="situacao">
                        <option value="">Selecione</option>
                        <option value="0" <?php if($pedidoCompra->situacao == 0) {echo 'selected';} ?>>Aberto</option>
                        <option value="1" <?php if($pedidoCompra->situacao == 1) {echo 'selected';} ?>>Fechado</option>
                        <option value="2" <?php if($pedidoCompra->situacao == 2) {echo 'selected';} ?>>Cancelado</option>
                      </select>

                    </div>
                    <div class="input col s3">
                      <label for="idFornecedor">Fornecedor</label><br />
                      <select class="browser-default" name="idFornecedor">
                      @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>


                <div class="row">
                    <button type="submit" class="waves-effect waves-green btn teal right">Salvar</button>
                    <a class="waves-effect waves-green btn-flat right" href="{{ route('pedidosCompras.index') }}">Cancelar</a>
                </div>
            </form>
            <p style="margin-left: 2%">* Campos Obrigatórios</p>
        </div>
    </div>
</div>



@endsection
