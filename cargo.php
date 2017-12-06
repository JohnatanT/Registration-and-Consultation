<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);

/* cargo */
	$cargo = $_POST['cargo'];
	if(empty($cargo)){//Verifica de está vázio
		throw new Exception("Nome Vazio");
	}elseif (strlen($cargo) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Cargo muito grande, tente abreviar.");
	}

	
	$ret = $contato->cadastro_cargo($cargo);
	echo json_encode($ret);
	

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}