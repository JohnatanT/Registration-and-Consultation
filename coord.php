<?php
require_once 'gMaps.php';
require_once 'Cad_coord.php';
require_once 'conexao.php';
require_once 'Coordenadas.php';

try {

	$user = new Coordenadas(); 
	$contato = new Cad_coord($mysqli,$user);

	// Instancia a classe
	$gmaps = new gMaps('AIzaSyAk9l6FzKbzLAI4pnB8o6_gxEIlUh-mDFs');//key do Google
	// Pega os dados (latitude, longitude e zoom) do endereço:

	$endereco = $_POST['endereco'];//Recebendo o endereço

	
	$dados = $gmaps->geoLocal($endereco);//Recebendo as coordanadas

	$env = $contato->insert($dados->lat,$dados->lng,$endereco);

	echo json_encode($env);//Passando as coordenadas para o Script JS

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}