<?php
$pdo = new PDO("mysql:host=localhost:3306;dbname=crud", "root", "") or die(mysql_error());
$requestData = $_REQUEST;

print_r($requestData);die;
/////
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
$a= array();
while ($row =  $query_resultado->fetchAll()) {
    $a['data'][] = $row;
}
*/

$a = $pessoas;
echo (json_encode($a));

?>