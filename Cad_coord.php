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

	//Retornar as coordenadas 
	public function retorno(){
		$stmt = $this->db->stmt_init();
		$stmt->prepare("SELECT * FROM mapa");
		$stmt->execute();
		$stmt->bind_result($id,$lat,$lng,$endereco);

		$arr =  array();
		while ($stmt->fetch()){//Recebendo todos os valores atraves de um array
        	$arr[] = array("id" => $id, "lat" => $lat, "lng" => $lng,"endereco" => $endereco);
        	//Criando um array associativo
    	}
    	//Retonando esse array
    	return $arr;
	}

	public function listar($pesquisa){
		$stmt = $this->db->stmt_init();
		$likeVar = "%" . $pesquisa . "%";//Criando variavel para poder user o parametro LIKE
		$stmt->prepare("SELECT * FROM mapa WHERE CONCAT_WS(' ', lat, lng, endereco) LIKE ?");
		$stmt->bind_param("s",$likeVar);
		$stmt->execute();
		$stmt->bind_result($id,$lat,$lng,$endereco);
		$arr = array();
		while ($stmt->fetch()){
			$arr[] = array("id" => $id, "lat" => $lat, "lng" => $lng, "endereco" => $endereco);
			//Criando um array associativo
		}
		return $arr;
		//Retornando esse array
	}

	public function deleteMapa($id){
		$stmt = $this->db->stmt_init();
		$stmt->prepare("DELETE FROM mapa WHERE id = ?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
	}



}