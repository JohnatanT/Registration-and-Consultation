<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);

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

	/* Senha */
	$senha = $_POST['senha'];
	$senha = filter_var($senha, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	if(empty($senha)){//Verifica de está vázio
		throw new Exception("senha Vazia");
	}elseif (strlen($senha) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("senha muito grande, tente abreviar.");
	}
	$codificada = sha1($senha);


//Retorna se existe algum registro
$lin = $contato->buscaEmail($email);

//Verifica se já existe um registro
if($lin > 0){//Se existir um registro será enviando o valor false ao arquivo JS
	$retorna1 = false;
	$lista_retorna = array();
	$lista_retorna[] = $retorna1;
	echo json_encode($lista_retorna);
}else{//Se não existir um registro será feito o cadastro
	$ret = $contato->insert_log($nome,$email,$codificada);
	echo json_encode($ret);
}


} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}