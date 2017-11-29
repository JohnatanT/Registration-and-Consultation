<?php

class User{

	private $tabela = "informacoes";
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $senha;

	public function getTabela(){
		return $this->tabela;
	}

	//Id
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	//Nome
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}

	//E-mail
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}

	//Nome
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}


	//Telefone
	public function getTelefone(){
		return $this->telefone;
	}
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

}