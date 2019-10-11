<?php
$pdo = new PDO("mysql:host=localhost:3306;dbname=crud2", "root", "root") or die(mysql_error());

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
    <title></title>
</head>
<body>

<?php
if (isset($erro))
    echo '<div style="color:#F00">' . $erro . '</div><br/><br/>';
else
    if (isset($sucesso))
        echo '<div style="color:#00f">' . $sucesso . '</div><br/><br/>';

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