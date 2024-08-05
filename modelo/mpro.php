<?php
include ("conexion.php");

class mpro{
	
	private $noidepro;
	private $nonitpro;
	private $razsocpro;
	private $dirpro;
	private $telpro;
	private $emailpro;
	private $contpro;
	private $codubi;

	//Metodos SET
	function setNoidepro($noidepro){
		$this->noidepro=$noidepro;
	}
	function setNonitpro($nonitpro){
		$this->nonitpro=$nonitpro;
	}
	function setRazsocpro($razsocpro){
		$this->razsocpro=$razsocpro;
	}
	function setDirpro($dirpro){
		$this->dirpro=$dirpro;
	}
	function setTelpro($telpro){
		$this->telpro=$telpro;
	}
	function setEmailpro($emailpro){
		$this->emailpro=$emailpro;
	}
	function setContpro($contpro){
		$this->contpro=$contpro;
	}
	function setCodubi($codubi){
		$this->codubi=$codubi;
	}


	//Metodos GET
	function getNoidepro(){
		return $this->noidepro;
	}
	function getNonitpro(){
		return $this->nonitpro;
	}
	function getRazsocpro(){
		return $this->razsocpro;
	}
	function getDirpro(){
		return $this->dirpro;
	}
	function getTelpro(){
		return $this->telpro;
	}
	function getEmailpro(){
		return $this->emailpro;
	}
	function getContpro(){
		return $this->contpro;
	}
	function getCodubi(){
		return $this->codubi;
	}

//SELECT noidepro, nonitpro, razsocpro, dirpro, telpro, emailpro, contpro, codubi FROM proveedor
	function insubi(){
		$sql= "INSERT INTO proveedor(nonitpro, razsocpro, telpro, dirpro, codubi, emailpro, contpro) VALUES (:nonitpro, :razsocpro, :telpro, :dirpro, :codubi, :emailpro, :contpro);";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nonitpro = $this->getNonitpro();
		$result->bindParam(":nonitpro", $nonitpro);
		$razsocpro = $this->getRazsocpro();
		$result->bindParam(":razsocpro", $razsocpro);
		$telpro = $this->getTelpro();
		$result->bindParam(":telpro", $telpro);
		$dirpro = $this->getDirpro();
		$result->bindParam(":dirpro", $dirpro);
		$codubi = $this->getCodubi();
		$result->bindParam(":codubi", $codubi);
		$emailpro = $this->getEmailpro();
		$result->bindParam(":emailpro", $emailpro);
		$contpro = $this->getContpro();
		$result->bindParam(":contpro", $contpro);
		$result->execute();
	}

	function updubi(){
		$sql= "UPDATE proveedor SET nonitpro=:nonitpro,razsocpro=:razsocpro,telpro=:telpro,dirpro=:dirpro,codubi=:codubi,emailpro=:emailpro,contpro=:contpro WHERE noidepro=:noidepro ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$noidepro = $this->getNoidepro();
		$result->bindParam(":noidepro" ,$noidepro);
		$nonitpro = $this->getNonitpro();
		$result->bindParam(":nonitpro", $nonitpro);
		$razsocpro = $this->getRazsocpro();
		$result->bindParam(":razsocpro", $razsocpro);
		$telpro = $this->getTelpro();
		$result->bindParam(":telpro", $telpro);
		$dirpro = $this->getDirpro();
		$result->bindParam(":dirpro", $dirpro);
		$codubi = $this->getCodubi();
		$result->bindParam(":codubi", $codubi);
		$emailpro = $this->getEmailpro();
		$result->bindParam(":emailpro", $emailpro);
		$contpro = $this->getContpro();
		$result->bindParam(":contpro", $contpro);
		$result->execute();
	}


	function delubi(){
		$sql= "DELETE FROM proveedor WHERE noidepro=:noidepro ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$noidepro = $this->getNoidepro();
		$result->bindParam(":noidepro" ,$noidepro);
		$result->execute();
	}

	function selubi1(){
		$sql= "SELECT p.noidepro, p.nonitpro, p.razsocpro, p.dirpro, p.telpro, p.emailpro, p.contpro, p.codubi, u.nomubi FROM proveedor AS p INNER JOIN ubicacion AS u ON p.codubi=u.codubi WHERE p.noidepro=:noidepro ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$noidepro = $this->getNoidepro();
		$result->bindParam(":noidepro", $noidepro);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
		
	}

	function selper(){
		$sql= "SELECT codubi, nomubi, depubi FROM ubicacion WHERE depubi=0 ORDER BY nomubi;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT p.noidepro, p.nonitpro, p.razsocpro, p.dirpro, p.telpro, p.emailpro, p.contpro, p.codubi, u.nomubi
			FROM proveedor AS p INNER JOIN ubicacion AS u ON p.codubi=u.codubi";
		if($filtro)
			$sql.= " WHERE p.razsocpro LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY p.razsocpro LIMIT ".$rvalini.", ".$rvalfin;
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
		$conp ="SELECT count(p.noidepro) as Npe FROM proveedor AS p INNER JOIN ubicacion AS u ON p.codubi=u.codubi";
		if($filtro)
			$conp.= " WHERE p.razsocpro LIKE '%".$filtro."%'";
		return $conp;
	}
}
?>

