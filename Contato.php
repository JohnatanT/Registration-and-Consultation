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
		$likeVar = "%" . $nome . "%";//Criando variavel para poder user o parametro LIKE
		$stmt->prepare("SELECT * FROM {$this->user->getTabela()} WHERE CONCAT_WS( ' ', name, email, telefone) LIKE ?");
		//Parametro LIKE procura qualquer nome com as iniciais ou finais da string
		$stmt->bind_param("s",$likeVar);//Passando a variavel 
		$stmt->execute();
		$stmt->bind_result($id,$name,$email,$telefone);
		$arr =  array();
		while ($stmt->fetch()) {//Recebendo todos os valores atraves de um array
        	$arr[] = array("id" => $id,"nome" => $name,"email" => $email, "telefone" => $telefone);
        	//Criando um array associativo
    	}
    	return $arr;
    	//Retornando esse array
	}
	//Delecão de Dados
	public function delete($id){
		$stmt = $this->db->stmt_init();
		$stmt->prepare("DELETE FROM {$this->user->getTabela()} WHERE id = ?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
	}
	//Função de Update
	public function update($id,$nome,$email,$telefone){
		$stmt = $this->db->stmt_init();
		//Recebe e armazena os valores em variaveis
		$this->user->setId($id);
		$this->user->setNome($nome);
		$this->user->setEmail($email);
		$this->user->setTelefone($telefone);
		$id = $this->user->getId();
		$nome =  $this->user->getNome();
		$email =  $this->user->getEmail();
		$telefone =  $this->user->getTelefone();
		//Preparando o UPDATE na tabela
		$stmt->prepare("UPDATE {$this->user->getTabela()} SET name = ?, email = ?, telefone = ? WHERE id = ?");
		$stmt->bind_param("sssi",$nome,$email,$telefone,$id);//Passando os valores
		$stmt->execute();
	}

	//Cadastro de Dados para Login
	public function insert_log($nome,$email,$senha){
		$stmt = $this->db->stmt_init();
		$stmt->prepare("INSERT INTO logar(nome,email,senha) VALUES(?,?,?)");

		$this->user->setNome($nome);
		$this->user->setEmail($email);
		$this->user->setSenha($senha);

		$nome =  $this->user->getNome();
		$email =  $this->user->getEmail();
		$senha =  $this->user->getSenha();

		$stmt->bind_param("sss",$nome,$email,$senha);
		$stmt->execute();
	}


}