<?php
session_start(); 

try {

#Verificação de Segurança

	
	$numero_aumento = $_POST['numero_aumento'];
	if(empty($numero_aumento)){//Verifica de está vázio
		throw new Exception("Vazio");
	}elseif (strlen($numero_aumento) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Muito grande");
	}

	$numero_neutro = $_POST['numero_neutro'];
	if(empty($numero_neutro)){//Verifica de está vázio
		throw new Exception("Vazio");
	}elseif (strlen($numero_neutro) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Muito grande");
	}

	$numero_baixo = $_POST['numero_baixo'];
	if(empty($numero_baixo)){//Verifica de está vázio
		throw new Exception("Vazio");
	}elseif (strlen($numero_baixo) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Muito grande");
	}

	$numero_critico = $_POST['numero_critico'];
	if(empty($numero_critico)){//Verifica de está vázio
		throw new Exception("Vazio");
	}elseif (strlen($numero_critico) > 100) {//Verificação do tamanho para evitar Spans
		throw new Exception("Muito grande");
	}


//$numero_aumento = $_POST['numero_aumento'];
//$numero_neutro = $_POST['numero_neutro'];
//$numero_baixo = $_POST['numero_baixo'];
//$numero_critico = $_POST['numero_critico'];


$total = $numero_aumento + $numero_neutro + $numero_baixo + $numero_critico;

	$por_aumento = ($numero_aumento/$total) * 100;
	$por_neutro = ($numero_neutro/$total) * 100;
	$por_baixo = ($numero_baixo/$total) * 100;
	$por_critico = ($numero_critico/$total) * 100;


	$_SESSION["por_aumento"]= $por_aumento; 
	$_SESSION["por_neutro"]= $por_neutro; 
	$_SESSION["por_baixo"]= $por_baixo; 
	$_SESSION["por_critico"]= $por_critico; 



$porcentagem = array("aumento" => $por_aumento, "neutro" => $por_neutro, "baixo" => $por_baixo, 'critico' => $por_critico);
echo json_encode($porcentagem);

	
} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}

