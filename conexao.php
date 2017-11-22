<?php
//Classes para manipular o Banco de Dados
require_once 'Contato.php';
require_once 'User.php';

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

try {
$user = new User(); 
$contato = new Contato($mysqli,$user);


//Validação Nome

$nome = $_POST['nome'];
if(empty($nome)){
	throw new Exception("Error! Nome em branco.");
}
//Validação E-mail
$email = $_POST['email'];
if(empty($email)){
	throw new Exception("Error! Email em branco.");
}
//Validação Telefone
$telefone = $_POST['telefone'];
if(empty($telefone)){
	throw new Exception("Error! Telefone em branco.");
}

//Enviando dados
$contato->insert($nome,$email,$telefone);
//Mensagem de envio dos dados com reload da página 

echo "<script>window.location='index.php';alert('$nome, sua mensagem foi enviada com sucesso!');</script>";

} catch (Exception $e) {
	echo "<script> alert('".$e->getMessage()."');</script>";
}





