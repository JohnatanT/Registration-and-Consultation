<?php
require_once 'gMaps.php';
require_once 'Cad_coord.php';
require_once 'conexao.php';
require_once 'Coordenadas.php';

try {
	
	$user = new Coordenadas();
	$contato = new Cad_coord($mysqli,$user);

	$pesquisa = $_POST['pesquisa'];

	$ret = $contato->listar($pesquisa);
	echo json_encode($ret);


} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}