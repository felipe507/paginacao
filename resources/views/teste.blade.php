
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
                    <h5>Exibindo {{ $clientes->count() }} de {{ $clientes->total() }} clientes {  {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }}}</h5>
                    <table class="table table-hover text-center">
                        <thead >
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Nome</th>
                            <th class="text-center" scope="col">Sobrenome</th>
                            <th class="text-center" scope="col">E-mail</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($clientes as $cliente )
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->sobrenome }}</td>
                                <td>{{ $cliente->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $clientes->links() }}
                    {{  $clientes->onEachSide(10)->links()  }}
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" type="text/javaript"></script>
    </body>
</html>
