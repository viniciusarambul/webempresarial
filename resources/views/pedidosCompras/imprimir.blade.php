<html>
<head>
      <style>

          body, html {
              font-family: 'Arial', sans-serif;
              margin: 0;
              font-size: 15px;

          }

          main {
              position: relative;
              width: 100%;
              margin-left: 2%;
              margin-right: 2%;
              padding-bottom: 2%;
          }

          main header,
          main footer,
          main article {
              padding: 10px;
          }
          th{
            padding: 2px;
            border-width: 1px;
            border-style: double;
            align: center;
          }
          td{
            border-width: 1px;
            border-style: double;
            font-size: 15px;
          }

      </style>
  </head>
    <body>



<main>
  <table style="width: 100% !important; margin-top: 5%;">
      <tr>
          <img src="http://sistema.awfranchising.com.br/web.png"  height="150" width="500" style="margin-left: 20%" />
      </tr>

  </table>
  <h1 align="center">Pedido Compra {{$pedidoCompra->id}}</h1>
      <table style="width: 100% !important">
                <thead>
                    <tr>

                        <th align="center" style="width:20% !important">ID</th>
                        <th align="center" style="width:20% !important">Data Pedido</th>
                        <th align="center" style="width:20% !important">Observação</th>
                        <th align="center" style="width:15% !important">Situação</th>
                        <th align="center" style="width:25% !important">Fornecedor</th>
                    </tr>
                </thead>

                <tbody>
                  <?php $status = array('Aberto', 'Fechado', 'Cancelado');
                  $tipo = array('Boleto', 'Cartão de Crédito', 'Cartão de Débito', '','','','Recibo')?>


        <tr>



              <td style="text-align: center">{{ $pedidoCompra->id }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($pedidoCompra->data)) }}</td>
              <td style="text-align: right">{{ isset($pedidoCompra->nome) ? $pedidoCompra->nome : 'Nenhuma' }}</td>
              <td style="text-align: center"> {{$pedidoCompra->situacao_descricao}} </td>
              <td style="text-align: center">{{ $pedidoCompra->fornecedores->nome }}</td>


        </tr>


        </tbody>
      </table>
    <h1 align="center">Itens no Pedido</h1>
    <table align="center">

        <thead>

        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor Unitário</th>
            <th>Total</th>

        </tr>
        </thead>

        <tbody>
        @foreach($pedidoCompra->itens as $item)
            <tr>
                <td>{{$item->produto->nome}}</td>
                <td style="text-align: right">{{$item->quantidade}}</td>
                <td style="text-align: right">{{number_format($item->valorUnitario, 2, ',', '.')}}</td>
                <td style="text-align: right">R$ {{number_format($item->preco, 2, ',', '.')}}</td>


            </tr>
        @endforeach
        <tr>
            <td colspan="3" style="text-align: right">Total</td>
            <td colspan="1">R$ {{number_format($pedidoCompra->totalpreco, 2, ',', '.')}}</td>
        </tr>
        </tbody>
    </table>
    @if(!empty($pedidoCompra->titulo))
    <h1 align="center">Dados de Pagamento do Pedido</h1>
    <table align="center">

        <thead>

        <tr>
            <th>Codigo Titulo:</th>
            <th>Data Emissão:</th>
            <th>Primeiro Vencimento:</th>
            <th>Situacao</th>
            <th>Parcelas</th>
            <th >Valor Total:</th>

        </tr>
        </thead>

        <tbody>

            <tr>
                <td>{{$pedidoCompra->titulo->id}}</td>
                <td>{{date('d/m/Y', strtotime($pedidoCompra->titulo->dataEmissao))}}</td>
                <td>{{date('d/m/Y', strtotime($pedidoCompra->titulo->dataVencimento))}}</td>
                <td>{{$pedidoCompra->titulo->situacao}}</td>
                <td>{{ $pedidoCompra->titulo->parcelas }}</td>
                <td style="text-align: right">{{ number_format($pedidoCompra->titulo->preco,2,',','.') }}</td>


            </tr>

        </tbody>
    </table>
    <br />

        <table align="center">

            <thead>

            <tr>
                <th>Data Vencimento</th>
                <th>Documento</th>
                <th>Valor</th>
                <th>Valor Pago</th>
                <th>Data Pagamento</th>

            </tr>
            </thead>

            <tbody>
            @foreach($pedidosCompraConta as $conta)
                <tr>
                    <td>{{date('d/m/Y', strtotime($conta->dataVencimento))}}</td>
                    <td> {{ isset($conta->tipoPagamento) ? $tipo[$conta->tipoPagamento] : '' }}</td>
                    <td>R$ {{ number_format($conta->valor,2,',','.') }}</td>
                    <td style="text-align: right">R$ {{ isset($conta->valorPago) ? number_format($conta->valorPago,2,',','.') : '0,00' }}</td>
                    <td>{{ isset($conta->dataPagamento) ? date('d/m/Y', strtotime($conta->dataPagamento)) : 'Não efetuado' }}</td>



                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right">Total</td>
                <td colspan="1">R$ {{number_format($pedidoCompra->totalpreco, 2, ',', '.')}}</td>
            </tr>
            </tbody>
        </table>

    @else
        <p>Não existe Dados de Pagamento do Pedido</p>
    @endif

</main>
    </body>
</html>
