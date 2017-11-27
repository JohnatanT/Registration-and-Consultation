<?php
//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';

try {
	//Instanciando minhas classes
	$user = new User(); 
	$contato = new Contato($mysqli,$user);

	#Verificação de Segurança

	/* Nome */
	$nome = $_POST['nome'];
	if(empty($nome)){//Verifica de está vázio
		throw new Exception("Nome Vazio");
	}elseif (strlen($nome) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Nome muito grande, tente abreviar.");
	}

	/* E-mail */
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if(empty($email)){//Verifica de está vázio
		throw new Exception("Email Vazio");
		
	}elseif(strlen($email) > 100){//Verificação do tamanho para evitar Spans
		throw new Exception("Email muito grande, ele realmente existe?");
	}

	/* Telefone */
	$telefone = $_POST['telefone'];
	$telefone = filter_var($telefone, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	if(empty($telefone)){//Verifica de está vázio
		throw new Exception("Telefone Vazio");
	}elseif (strlen($telefone) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Nome muito grande, tente abreviar.");
	}

//Enviando dados
$env = $contato->insert($nome,$email,$telefone);
echo json_encode($env);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}





