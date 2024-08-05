<?php
include ("conexion.php");

class mmpri{

	private $nommatp;
	private $vlrmatp;
	private $idmat;

	//set
	function setNommatp($nommatp){
		$this->nommatp=$nommatp;
	}
	function setIdmat($idmat){
		$this->idmat=$idmat;
	}

	function setVlrmatp($vlrmatp){
		$this->vlrmatp=$vlrmatp;
	}

	//get
	function getNommatp(){
		return $this->nommatp;
	}
	function getIdmat(){
		return $this->idmat;
	}
	function getVlrmatp(){
		return $this->vlrmatp;
	}


	function cons($con){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($con);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
//SELECT idmat, nommatp, vlrmatp FROM materiap
	function insubi(){
		$sql= "INSERT INTO materiap (nommatp, vlrmatp) VALUES (:nommatp,:vlrmatp);";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nommatp = $this->getNommatp();
		$vlrmatp = $this->getVlrmatp();
		$result->bindParam(":nommatp", $nommatp);
		$result->bindParam(":vlrmatp", $vlrmatp);
		$result->execute();
	}

	function updubi(){
		$modelo = new conexion();		$sql= "UPDATE materiap SET nommatp=:nommatp, vlrmatp=:vlrmatp WHERE idmat=:idmat;";

		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nommatp = $this->getNommatp();
		$vlrmatp = $this->getVlrmatp();
		$idmat = $this->getIdmat();
		$result->bindParam(":idmat", $idmat);
		$result->bindParam(":nommatp", $nommatp);
		$result->bindParam(":vlrmatp", $vlrmatp);
		$result->execute();
	}

	function delubi(){
		$sql= "DELETE FROM materiap WHERE idmat=:idmat;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idmat = $this->getIdmat();
		$result->bindParam(":idmat", $idmat);
		$result->execute();
	}

	function selubi1(){
		$sql= "SELECT idmat, nommatp, vlrmatp FROM materiap WHERE idmat=:idmat;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idmat = $this->getIdmat();
		$result->bindParam(":idmat", $idmat);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT idmat, nommatp, vlrmatp FROM materiap";
		if($filtro)
			$sql.= " WHERE nommatp LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY nommatp LIMIT ".$rvalini.", ".$rvalfin;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
	function sqlcount($filtro){
		$conp ="SELECT count(idmat) as Npe FROM materiap";
		if($filtro)
			$conp.= " WHERE nommatp LIKE '%".$filtro."%'";
		return $conp;
	}
}
?>