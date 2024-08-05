<?php
include ("conexion.php");
class mcat{

	private $codcat;
	private $nomcat;
	private $coddep;

	function getCodcat(){
		return $this->codcat;
	}
	function getNomcat(){
		return $this->nomcat;
	}
	function getCoddep(){
		return $this->coddep;
	}

	function setCodcat($codcat){
		$this->codcat = $codcat;
	}
	function setNomcat($nomcat){
		$this->nomcat = $nomcat;
	}
	function setCoddep($coddep){
		$this->coddep = $coddep;
	}

	function cons($con){
		$cnbd = new conexion();

		$cnbd->ejeCon($con,1);
	}

	function insubi(){
		$sql= "INSERT INTO categoria (nomcat) VALUES (:nomcat)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nomcat=$this->getNomcat();
		$result->bindParam(':nomcat',$nomcat);
		$result->execute();

	}

	function updubi(){
		$sql= "UPDATE categoria SET nomcat=:nomcat WHERE codcat=:codcat";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nomcat=$this->getNomcat();
		$result->bindParam(':nomcat',$nomcat);
		$codcat=$this->getCodcat();
		$result->bindParam(':codcat',$codcat);
		$result->execute();
		
	}
		
	function delubi(){
	
		$sql= "DELETE FROM categoria WHERE codcat=:codcat;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$codcat=$this->getCodcat();
		$result->bindParam(':codcat',$codcat);
		$result->execute();
	
	}

	function selubi(){
		$sql= "SELECT codcat, nomcat FROM categoria;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res=null;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selubi1(){
		$sql= "SELECT codcat, nomcat FROM categoria WHERE codcat=:codcat;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$codcat=$this->getCodcat();
		$result->bindParam(':codcat',$codcat);
		$result->execute();
		$res=null;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT codcat, nomcat FROM categoria";
		if($filtro)
			$sql.= " WHERE nomcat LIKE '%".$filtro."%'";
		$sql .= " ORDER BY nomcat LIMIT ".$rvalini.", ".$rvalfin;
		//echo $sql;
		$conexionDB=new conexion();
	
		$data=$conexionDB->ejeCon($sql, 0);
		return $data;
	}
	
	function sqlcount($filtro){
		$conp ="SELECT count(codcat) as Npe FROM categoria";
		if($filtro)
			$conp.= " WHERE nomcat LIKE '%".$filtro."%'";
		return $conp;
	}
}
?>