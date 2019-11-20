<?php
$pdo = new PDO("mysql:host=localhost:3306;dbname=crud", "root", "") or die(mysql_error());

if (!$pdo) {
    echo "Ocorreu um erro na conexão com o banco de dados.";
    exit;
}

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"])) {
    if (empty($_POST["nome"]))
        $erro = "Campo nome obrigatório";
    else
        if (empty($_POST["email"]))
            $erro = "Campo e-mail obrigatório";
        else {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];

            $stmt = $pdo->prepare("INSERT INTO `pessoa` (`Nome`,`Email`,`Cidade`,`Uf`)
            VALUES (:nome,:email,:cidade,:uf)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cidade", $cidade);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":uf", $uf);

            if (!$stmt->execute()) {
                $erro = $stmt->errorCode();
            } else {
                $sucesso = "Dados cadastrados com sucesso!";
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Css/bootstrap.css"
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</head>
<body>

<?php
if (isset($erro))
    echo '<div style="color:#F00">' . $erro . '</div><br/><br/>';
else
    if (isset($sucesso))
        echo '<div style="color:#00f">' . $sucesso . '</div><br/><br/>'

?>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
    Nome:<br/>
    <input type="text" name="nome" placeholder="Qual seu nome?"><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" placeholder="Qual seu e-mail?"><br/><br/>
    Cidade:<br/>
    <input type="text" name="cidade" placeholder="Qual sua cidade?"><br/><br/>
    UF:<br/>
    <input type="text" name="uf" size="2" placeholder="UF">
    <br/><br/>
    <input type="hidden" value="-1" name="id">
    <button type="submit">Cadastrar</button>
</form">
</body>
</html>