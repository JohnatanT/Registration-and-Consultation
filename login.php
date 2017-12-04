<?php

//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'conexao.php';


try {
	// Inicia sessões 
	session_start(); 

	$user = new User();
	$contato = new Contato($mysqli,$user);

	/* Senha */
	$_senha = $_POST['senha'];
	if(empty($_senha)){//Verifica de está vázio
		throw new Exception("Senha Vazia");
	}elseif (strlen($_senha) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Senha muito grande, tente abreviar.");
	}

	$senha = sha1($_senha);

	/* E-mail */
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if(empty($email)){//Verifica de está vázio
		throw new Exception("Email Vazio");
		
	}elseif(strlen($email) > 100){//Verificação do tamanho para evitar Spans
		throw new Exception("Email muito grande, ele realmente existe?");
	}

	$ret = $contato->verifica($email,$senha);

	foreach ($ret as $value) {
		if($email == $value['email'] && $senha == $value['senha']){
			echo json_encode($ret);
			$_SESSION["id_usuario"]= $value["id"]; 
			$_SESSION["nome_usuario"] = $value['nome'];
			$_SESSION["email_usuario"] = $value['email'];
			$_SESSION["senha_user"]= $value["senha"];
		}else{
			$retorna1 = false;
			$lista_retorna = array();
			$lista_retorna[] = $retorna1;
			echo json_encode($lista_retorna);
		}
		
	}

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}