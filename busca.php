<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);

//Recebendo data do Ajax
$busca = $_POST['acao'];


$ret = $contato->find($busca);
echo json_encode($ret);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}