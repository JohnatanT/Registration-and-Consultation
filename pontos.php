
<?php
require_once 'gMaps.php';
require_once 'Cad_coord.php';
require_once 'conexao.php';
require_once 'Coordenadas.php';

try {

	$user = new Coordenadas(); 
	$contato = new Cad_coord($mysqli,$user);


	$ret = $contato->retorno();//Função que retornará as coordenadas no BD
	echo json_encode($ret);//Retornando coordenadas para o arquivo JS


} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}