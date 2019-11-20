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
</head>
<body>


<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">


    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome"  placeholder="Nome">
    </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email"  placeholder="E-mail">
        </div>
    <div class="form-group">
        <label >Cidade</label>
        <input type="text" class="form-control" name="cidade" placeholder="Cidade">
    </div>
    <div class="form-group">
        <label>UF</label>
        <input type="text" class="form-control" name="uf" placeholder="UF">
    </div>
        <fieldset class="form-group">
            <input type="hidden" value="-1" name="id">
            <button type="submit">Cadastrar</button>
    </fieldset>
</form>

<?php
if (isset($erro))
    echo '<div style="color:#F00">' . $erro . '</div><br/><br/>';
else
    if (isset($sucesso))
        echo '<div style="color:#00f">' . $sucesso . '</div><br/><br/>'

?>
</body>
</html>