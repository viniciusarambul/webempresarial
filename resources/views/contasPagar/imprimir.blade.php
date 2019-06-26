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
          <img src="http://sistema.awfranchising.com.br/web.png"  height="150" width="500" style="margin-left: 27%" />
      </tr>

  </table>
  <h1 align="center">Recibo Pagamento</h1>
      <table style="width: 100% !important">
                <thead>
                    <tr>

                        <th align="center" style="width:20% !important">ID</th>
                        <th align="center" style="width:20% !important">Data Emissão</th>
                        <th align="center" style="width:20% !important">Data Vencimento</th>
                        <th align="center" style="width:20% !important">Observação</th>
                        <th align="center" style="width:15% !important">Situação</th>
                        <th align="center" style="width:15% !important">Valor</th>
                        <th align="center" style="width:25% !important">Fornecedor</th>
                        <th align="center" style="width:25% !important">Pedido Compra</th>
                        <th align="center" style="width:25% !important">Data Pagamento</th>
                        <th align="center" style="width:25% !important">Valor Pago</th>
                    </tr>
                </thead>

                <tbody>
                  <?php $status = array('Aberto', 'Fechado', 'Cancelado');
                  $tipo = array('Boleto', 'Cartão de Crédito', 'Cartão de Débito', '','','','Recibo')?>


        <tr>



              <td style="text-align: center">{{ $contaPagar->id }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaPagar->dataEmissao)) }}</td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaPagar->dataVencimento)) }}</td>
              <td style="text-align: right">{{ isset($contaPagar->descricao) ? $contaPagar->descricao : 'Nenhuma' }}</td>
              <td style="text-align: center"> {{$contaPagar->situacao_descricao}} </td>
              <td style="text-align: center"> {{number_format($contaPagar->valor,2,',','.')}} </td>
              <td style="text-align: center"> {{isset($contaPagar->idFornecedor) ? $contaPagar->fornecedor->nome : 'Nenhum'}} </td>
              <td style="text-align: center"> {{isset($contaPagar->idPedidoCompra) ? $contaPagar->idPedidoCompra : 'Nenhum'}} </td>
              <td style="text-align: center">{{ date('d/m/Y', strtotime($contaPagar->dataPagamento)) }}</td>
            <td style="text-align: center"> {{number_format($contaPagar->valorPago,2,',','.')}} </td>



        </tr>


        </tbody>
      </table>
    <table width="100%" style="margin-top: 15%; margin-left: 290%;">
        <tr style="border:0px;">
            <td style="text-align: center; border-width: 0;">
                _____________________________________<br />
                Assinatura Responsável Recebimento<br /> {{$contaPagar->fornecedor->nome}} {{$contaPagar->fornecedor->sobrenome}}
            </td>

        </tr>
    </table>

</main>
    </body>
</html>
