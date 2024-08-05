<?php
include ("conexion.php");

class mcli{
	private $nodoccli;
	private $nomcli;
	private $telcli;
	private $dircli;
	private $codubi;
	private $emacli;
	private $noidecli;

	function setNodoccli($nodoccli){
		$this->nodoccli=$nodoccli;
	}
	function setNomcli($nomcli){
		$this->nomcli=$nomcli;
	}
	function setTelcli($telcli){
		$this->telcli=$telcli;
	}
	function setDircli($dircli){
		$this->dircli=$dircli;
	}
	function setCodubi($codubi){
		$this->codubi=$codubi;
	}
	function setEmacli($emacli){
		$this->emacli=$emacli;
	}
	function setNoidecli($noidecli){
		$this->noidecli=$noidecli;
	}
	function getNoidecli(){
		return $this->noidecli;
	}
	function getNodoccli(){
		return $this->nodoccli;
	}
	function getNomcli(){
		return $this->nomcli;
	}
	function getTelcli(){
		return $this->telcli;
	}
	function getDircli(){
		return $this->dircli;
	}
	function getCodubi(){
		return $this->codubi;
	}
	function getEmacli(){
		return $this->emacli;
	}
	function cons($con){
		$cnbd = new conexion();

		$cnbd->ejeCon($con,1);
	}
//insubi($noidecli, $nodoccli, $nomcli, $telcli, $dircli, $codubi, $emacli);
	function insubi(){
		$sql= "INSERT INTO cliente (nodoccli, nomcli, telcli, dircli, codubi, emacli) VALUES (:nodoccli, :nomcli, :telcli, :dircli, :codubi, :emacli);";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nodoccli = $this->getNodoccli();
		$nomcli = $this->getNomcli();
		$telcli = $this->getTelcli();
		$dircli = $this->getDircli();
		$codubi = $this->getCodubi();
		$emacli = $this->getEmacli();
		$result->bindParam(":nodoccli",$nodoccli);
		$result->bindParam(":nomcli",$nomcli);
		$result->bindParam(":telcli",$telcli);
		$result->bindParam(":dircli",$dircli);
		$result->bindParam(":emacli",$emacli);
		$result->bindParam(":codubi",$codubi);
		$result->execute();
	}

	function updubi(){
		$sql= "UPDATE cliente SET nodoccli=:nodoccli,nomcli=:nomcli,dircli=:dircli,telcli=:telcli,emacli=:emacli,codubi=:codubi WHERE noidecli=:noidecli";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nodoccli = $this->getNodoccli();
		$nomcli = $this->getNomcli();
		$telcli = $this->getTelcli();
		$dircli = $this->getDircli();
		$codubi = $this->getCodubi();
		$emacli = $this->getEmacli();
		$noidecli=$this->getNoidecli();
		$result->bindParam(":noidecli",$noidecli);
		$result->bindParam(":nodoccli",$nodoccli);
		$result->bindParam(":nomcli",$nomcli);
		$result->bindParam(":telcli",$telcli);
		$result->bindParam(":dircli",$dircli);
		$result->bindParam(":emacli",$emacli);
		$result->bindParam(":codubi",$codubi);
		$result->execute();

	}

	function delubi(){
		$sql= "DELETE FROM cliente WHERE noidecli=:noidecli";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$noidecli=$this->getNoidecli();
		$result->bindParam(":noidecli",$noidecli);
		$result->execute();
	}

	function selubi1(){
		$sql= "SELECT c.noidecli, c.nodoccli, c.nomcli, c.telcli, c.dircli, c.codubi, u.nomubi, c.emacli FROM cliente AS c INNER JOIN ubicacion AS u ON c.codubi=u.codubi WHERE noidecli=:noidecli";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$noidecli=$this->getNoidecli();
		$result->bindParam(":noidecli",$noidecli);
		$result->execute();
		$res=null;
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
		$res=null;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT c.noidecli, c.nodoccli, c.nomcli, c.dircli, c.telcli, c.emacli, c.codubi, v.nomubi FROM cliente AS c INNER JOIN ubicacion AS v ON c.codubi=v.codubi";
		if($filtro)
			$sql.= " WHERE c.nomcli LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY c.nomcli LIMIT ".$rvalini.", ".$rvalfin;
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res=null;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
	function sqlcount($filtro){
		$conp ="SELECT count(c.noidecli) as Npe FROM cliente AS c INNER JOIN ubicacion AS v ON c.codubi=v.codubi";
		if($filtro)
			$conp.= " WHERE c.nomcli LIKE '%".$filtro."%'";
		return $conp;
	}
}
?>