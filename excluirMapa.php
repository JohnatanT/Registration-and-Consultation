<?php

//Classes para manipular o Banco de Dados
require_once 'gMaps.php';
require_once 'Cad_coord.php';
require_once 'conexao.php';
require_once 'Coordenadas.php';

try {
$user = new Coordenadas(); 
$contato = new Cad_coord($mysqli,$user);

//Recebendo data do Ajax
$busca_ex = $_POST['id'];


$ret = $contato->deleteMapa($busca_ex);
echo json_encode($ret);

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}