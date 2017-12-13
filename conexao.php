<?php

//Conexão com o banco de dados

$server = "localhost";
$user = "root";
$pass = "";
$db = "cadastro";

@$mysqli = new mysqli($server,$user,$pass,$db);

//Verificação de Conexão com Banco de Dados
if(mysqli_connect_errno()){
	echo "Falha na conexão: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}


