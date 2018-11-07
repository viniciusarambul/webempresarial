<html>
<head>
      <style>

          body, html {
              font-family: 'Arial', sans-serif;
              margin: 0;
              font-size: 15px;
              background-color: #ccc;
          }

          main {
              position: relative;
              width: 100%;
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

      </style>
  </head>
    <body>



<main>
  <h1 align="center">Vendedores</h1>
      <table style="width: 100% !important">
                <thead>
                    <tr>

                        <th align="center" style="width:11% !important">Nome</th>
                        <th align="center" style="width:12% !important">Sobrenome</th>
                        <th align="center" style="width:5% !important">Status</th>
                        <th align="center" style="width:11% !important">Telefone</th>
                        <th align="center" style="width:13% !important">E-mail</th>
                        <th align="center" style="width:11% !important">Cidade</th>
                        <th align="center" style="width:11% !important">Estado</th>
                        <th align="center" style="width:11% !important">CPF</th>
                        <th align="center" style="width:13% !important">CNPJ</th>
                    </tr>
                </thead>

                <tbody>

            @foreach($vendedores as $vendedor)
        <tr>



              <td>{{ $vendedor->nome }}</td>
              <td style="text-align: center">{{ $vendedor->sobrenome }}</td>
              <td style="text-align: center">{{ $vendedor->status }}</td>
              <td style="text-align: center">{{ $vendedor->telefone }}</td>
              <td style="text-align: center">{{ $vendedor->email }}</td>
              <td style="text-align: center">{{ $vendedor->cidade }}</td>
              <td style="text-align: center">{{ $vendedor->estado }}</td>
              <td style="text-align: center">{{ $vendedor->cpf }}</td>
              <td style="text-align: center">{{ $vendedor->cnpj }}</td>


        </tr>
          @endforeach

        </tbody>
      </table>
    </main>
    </body>
</html>
