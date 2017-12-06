<?php
session_start(); 
//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';


try {
	// Inicia sessões 
	
	$user = new User();
	$contato = new Contato($mysqli,$user);

	$ret = $contato->retCargos();
	echo json_encode($ret);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}