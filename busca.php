<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'User.php';

//Conexão com o banco de dados
$server = "localhost";
$user = "root";
$pass = "";
$db = "cadastro";

@$mysqli = new mysqli($server,$user,$pass,$db);

//Verificação de Conexão com Banco de Dados
if(mysqli_connect_errno()){
	echo "Falha na conexão: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);


$busca = $_POST['acao'];//Recebendo data do Ajax

$ret = $contato->find($busca);
echo json_encode($ret);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}