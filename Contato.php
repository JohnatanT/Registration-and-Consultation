<?php

require_once 'User.php';

class Contato{
	private $db;
	private $user;

	function __construct(Mysqli $mysqli, User $user){
		$this->db = $mysqli;
		$this->user = $user;
	}

	//Banco de dados
	public function getDb(){
		return $this->db;
	}
	public function setDb($db){
		$this->db = $db;
	}
	//Inserção de dados
	public function insert($nome,$email,$telefone){
		$stmt = $this->db->stmt_init();
		$stmt->prepare("INSERT INTO {$this->user->getTabela()}(name,email,telefone) VALUES(?,?,?)");

		$this->user->setNome($nome);
		$this->user->setEmail($email);
		$this->user->setTelefone($telefone);

		$nome =  $this->user->getNome();
		$email =  $this->user->getEmail();
		$telefone =  $this->user->getTelefone();

		$stmt->bind_param("sss",$nome,$email,$telefone);
		$stmt->execute();
	}
	//Listagem de dados
	public function find($nome){
		$stmt = $this->db->stmt_init();
		$likeVar = "%" . $nome . "%";
		$stmt->prepare("SELECT * FROM {$this->user->getTabela()} WHERE CONCAT_WS(' ', name, email, telefone) LIKE ?");
		$stmt->bind_param("s",$likeVar);
		$stmt->execute();
		$stmt->bind_result($id,$name,$email,$telefone);
		
		$arr =  array();
		while ($stmt->fetch()) {
        	$arr[] = array("id" => $id,"nome" => $name,"email" => $email, "telefone" => $telefone);
    	}
    	return $arr;
	}

}