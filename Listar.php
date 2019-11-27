<html>
<head>
        <link rel="stylesheet" type="text/css" href="Css/boot.css" media="screen" />
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">


            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Cadastro.php">Cadastrar <span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="Listar.php">Listar <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="Jquery/jquery-3.3.1.js"></script>
    <script src="Jquery/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="JavaScript>">
        $(document).ready(function() {
            $('#teste').DataTable( {
                "processing": true,
                "serverSide": true,
                "type": "POST",
                "ajax": {
                    "url": 'ListarPessoas.php',
                    "dataSrc": ""
                    }
                } );
            });          
    </script>
</head>
<body>
<table id="teste" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cidade</th>
                <th>E-mail</th>
                <th>UF</th>
            </tr>
        </thead>
</table>
</body>
</html>