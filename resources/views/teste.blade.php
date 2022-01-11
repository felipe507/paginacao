
<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Paginacao</title>
        <style>
            .pagination{
                justify-content: center;
            }
            body{
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                   <h1> Tabelas de clientes </h1>
                </div>
                <div class="card-body">
                    <h5>Exibindo 10 de 10000 clientes {1 a 10}</h5>
                    <table class="table table-hover text-center">
                        <thead >
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Nome</th>
                            <th class="text-center" scope="col">Sobrenome</th>
                            <th class="text-center" scope="col">E-mail</th>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>1</td>
                                <td>João</td>
                                <td>Silva</td>
                                <td>joao@gmail.com</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>João</td>
                                <td>Silva</td>
                                <td>joao@gmail.com</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>João</td>
                                <td>Silva</td>
                                <td>joao@gmail.com</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>João</td>
                                <td>Silva</td>
                                <td>joao@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Pagina 1 de 10
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" type="text/javaript"></script>
    </body>
</html>
