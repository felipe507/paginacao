
<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Scripts -->
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
                    <h5>Exibindo 1 de 10</h5>
                    <table class="table table-hover text-center" id="tabelaClientes">
                        <thead >
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Nome</th>
                            <th class="text-center" scope="col">Sobrenome</th>
                            <th class="text-center" scope="col">E-mail</th>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="card-footer">

                        <nav id="paginationNav">
                          <ul class="pagination">
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/app.js') }}" type="text/javaript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>

     function getNextItem(data) {
        i = data.current_page+1;
        if (data.current_page == data.last_page)
            s = '<li class="page-item disabled">';
        else
            s = '<li class="page-item">';
        s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Próximo</a></li>';
        return s;
    }

    function getPreviousItem(data) {
        i = data.current_page-1;
        if (data.current_page == 1)
            s = '<li class="page-item disabled">';
        else
            s = '<li class="page-item">';
        s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Anterior</a></li>';
        return s;
    }

    function getItem(data, i) {
        if (data.current_page == i)
            s = '<li class="page-item active">';
        else
            s = '<li class="page-item">';
        s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">' + i + '</a></li>';
        return s;
    }

    function montarPaginator(data) {

        $("#paginationNav>ul>li").remove();

        $("#paginationNav>ul").append(
            getPreviousItem(data)
        );
        // for (i=1;i<=data.last_page;i++) {
        //     $("#paginationNav>ul").append(
        //         getItem(data,i)
        //     );
        // }

        n = 10;

        if (data.current_page - n/2 <= 1)
            inicio = 1;
        else if (data.last_page - data.current_page < n)
            inicio = data.last_page - n + 1;
        else
            inicio = data.current_page - n/2;

        fim = inicio + n-1;

        for (i=inicio;i<=fim;i++) {
            $("#paginationNav>ul").append(
                getItem(data,i)
            );
        }
        $("#paginationNav>ul").append(
            getNextItem(data)
        );
    }

    function montarLinha(cliente) {
        return '<tr>' +
            '  <th scope="row">' + cliente.id + '</th>' +
            '  <td>' + cliente.nome + '</td>' +
            '  <td>' + cliente.sobrenome + '</td>' +
            '  <td>' + cliente.email + '</td>' +
            '</tr>';
    }

    function montarTabela(data) {
        $("#tabelaClientes>tbody>tr").remove();
        for(i=0;i<data.data.length;i++) {
            $("#tabelaClientes>tbody").append(
                montarLinha(data.data[i])
            );
        }
    }

    function carregarClientes(pagina) {
        $.get('/json',{page: pagina}, function(resp) {
            console.log(resp);
            console.log(resp.data.length);
            montarTabela(resp);
            montarPaginator(resp);
            $("#paginationNav>ul>li>a").click(function(){
                // console.log($(this).attr('pagina') );
                carregarClientes($(this).attr('pagina'));
            })
            $("#cardtitle").html( "Exibindo " + resp.per_page +
                " clientes de " + resp.total +
                " (" + resp.from + " a " + resp.to +  ")" );
        });
    }

    $(function(){
        carregarClientes(1);
    });

        </script>

    </body>
</html>
