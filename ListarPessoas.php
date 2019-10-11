<?php
$pdo = new PDO("mysql:host=localhost:3306;dbname=crud2", "root", "root") or die(mysql_error());
$requestData = $_REQUEST;


$columns = array(
    array('0' => 'Nome'),
    array('1' => 'Email'),
    array('2' => 'Cidade'),
    array('3' => 'UF'),

);


    $query = "SELECT p.Nome,p.Cidade,p.Email, p.UF  FROM  pessoa p";
    $query_resultado = $pdo->prepare($query);
    $query_resultado->execute();


    $pessoas = $query_resultado->fetchAll();
/*
while($row_pessoas = $query_resultado->fetchAll()){
    $dados = array();
    $dados[] = $row_pessoas["Nome"];
    $dados[] = $row_pessoas["Email"];
    $dados[] = $row_pessoas["Cidade"];
    $dados[] = $row_pessoas["UF"];
    $dados[]=$dados;
}
foreach ($pessoas as $pessoa) {
    $dados = array();
    $dados[] = $pessoa['Nome'];
    $dados[] = $pessoa["Email"];
    $dados[] =  $pessoa['Cidade'];
    $dados[] = $pessoa["UF"];
    $dados[]=$dados;
}
*/
    foreach ($pessoas as $pessoa) {
        echo $pessoa['Nome'] . '<br />';
        echo $pessoa['Email'] . '<br />';
        echo $pessoa['Cidade'] . '<br />';
        echo $pessoa['UF'] . '<br />';
    }
    /*
$json_data = array(
    "data" =>$dados

);
echo json_encode($json_data);
    */
?>