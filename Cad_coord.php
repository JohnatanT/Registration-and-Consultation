<?php

require_once 'Coordenadas.php';

class Cad_coord{
	
	private $db;
	private $user;

	function __construct(Mysqli $mysqli,$user){
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
	public function insert($lat,$lng,$endereco){
		$stmt = $this->db->stmt_init();
		$stmt->prepare("INSERT INTO mapa(lat,lng,endereco) VALUES(?,?,?)");

		$this->user->setLat($lat);
		$this->user->setLng($lng);
		$this->user->setEndereco($endereco);
		
		$lat =  $this->user->getLat();
		$lng =  $this->user->getLng();
		$endereco =  $this->user->getEndereco();



		$stmt->bind_param("sss",$lat,$lng,$endereco);
		$stmt->execute();
	}




}