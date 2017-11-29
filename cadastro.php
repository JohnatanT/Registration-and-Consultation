<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);

//Recebendo data do Ajax
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$codificada = sha1($senha);


$ret = $contato->insert_log($nome,$email,$codificada);
echo json_encode($ret);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}