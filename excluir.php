<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);

//Recebendo data do Ajax
$busca_ex = $_POST['acao_ex'];


$ret = $contato->delete($busca_ex);
echo json_encode($ret);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}