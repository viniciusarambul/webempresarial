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
            font-size: 13px;
          }

          .header,.footer {
              width: 100%;
              text-align: center;
              position: fixed;
          }
          .header {
              top: 0px;
          }
          .footer {
              bottom: 0px;
          }
          .pagenum:before {
              content: counter(page);
          }

      </style>
  </head>
    <body>

<main>
    <table style="width: 100% !important; margin-top: 5%;">
        <tr>
            <img src="http://sistema.awfranchising.com.br/web.png"  height="150" width="500" style="margin-left: 28%" />
        </tr>


    </table>

  <h1 align="center">Relatório de Clientes</h1>
      <table style="width: 100%">
                <thead >
                    <tr>

                        <th align="center" style="width:11% !important">Nome</th>
                        <th align="center" style="width:11% !important">Sobrenome</th>
                        <th align="center" style="width:11% !important">Status</th>
                        <th align="center" style="width:11% !important">Telefone</th>
                        <th align="center" style="width:11% !important">E-mail</th>
                        <th align="center" style="width:8% !important">Cidade</th>
                        <th align="center" style="width:5% !important">Estado</th>
                        <th align="center" style="width:11% !important">CPF</th>
                        <th align="center" style="width:11% !important">CNPJ</th>
                    </tr>
                </thead>

                <tbody>

            @foreach($clientes as $cliente)
        <tr>
              <td>{{ $cliente->nome }}</td>
              <td style="text-align: center">{{ $cliente->sobrenome }}</td>
              <td style="text-align: center">{{ $cliente->status }}</td>
              <td style="text-align: center">{{ $cliente->telefone }}</td>
              <td style="text-align: left">{{ $cliente->email }}</td>
              <td style="text-align: center">{{ $cliente->cidade }}</td>
              <td style="text-align: center">{{ $cliente->estado }}</td>
              <td style="text-align: center">{{ $cliente->cpf }}</td>
              <td style="text-align: center">{{ $cliente->cnpj }}</td>


        </tr>
          @endforeach

        </tbody>
      </table>
    </main>
    </body>
</html>
