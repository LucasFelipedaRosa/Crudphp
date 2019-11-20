<html>
<title></title>
<head>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="Jquery/jquery-3.3.1.js"></script>
    <script src="Jquery/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="JavaScript>">
        $(document).ready(function() {
            $('#teste').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": 'ListarPessoas.php',
                    "dataSrc": ""
                    }
                } );
            } );          
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