<?php 
include("conexion.php"); 
class mpags{
	
	private $idpag;
	private $nompag;
	private $nomarc;
	private $mos;
	private $ord;
	private $ico;

function setIdpag($idpag){
$this ->idpag=$idpag;
}
function setNompag($nompag){
$this ->nompag=$nompag;
}
function setNomarc($nomarc){
$this ->nomarc=$nomarc;
}
function setMos($mos){
$this ->mos=$mos;
}
function setOrd($ord){
$this ->ord=$ord;
}
function setIco($ico){
$this ->ico=$ico;
}

function getIdpag(){
	return $this ->idpag;
	}
	function getNompag(){
	return $this ->nompag;
	}
	function getNomarc(){
	return $this ->nomarc;
	}
	function getMos(){
	return $this ->mos;
	}
	function getOrd(){
	return $this ->ord;
	}
	function getIco(){
	return $this ->ico;
	}
	
//SELECT idpag, nompag, nomarc, mos, ord FROM pagina
	function inspag(){
		$sql = "INSERT INTO pagina(idpag, nompag, nomarc, mos, ord, ico) VALUES (:idpag, :nompag, :nomarc, :mos, :ord, :ico)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);	
		$idpag=$this ->getIdpag();
		$nompag=$this ->getNompag();
		$nomarc=$this ->getNomarc();
		$mos=$this ->getMos();
		$ord=$this ->getOrd();
		$ico=$this ->getIco();
		$result -> bindParam(":idpag", $idpag);
		$result -> bindParam(":nompag", $nompag);
		$result -> bindParam(":nomarc", $nomarc);
		$result -> bindParam(":mos", $mos);
		$result -> bindParam(":ord", $ord);
		$result -> bindParam(":ico", $ico);
		$result->execute();

	}

	function selpag(){
		$sql = "SELECT idpag, nompag, nomarc, mos, ord, ico FROM pagina ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function delpag(){
		$sql="DELETE FROM pagina WHERE idpag=:idpag ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idpag = $this->getIdpag();
		$result->bindParam(":idpag",$idpag);
		$result->execute();
	}

	function selp(){
		$sql = "SELECT p.idpag, p.nompag,p.nomarc, p.mos, p.ord, p.ico FROM pagina as p WHERE idpag=:idpag ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idpag = $this->getIdpag();
		$result->bindParam(":idpag",$idpag);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function actpag(){
		$sql = "UPDATE pagina SET idpag=:idpag, nompag=:nompag, nomarc=:nomarc, mos=:mos, ord=:ord, ico=:ico WHERE idpag=:idpag";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idpag=$this->getIdpag();
		$nompag=$this->getNompag();
		$nomarc=$this->getNomarc();
		$mos=$this->getMos();
		$ord=$this->getOrd();
		$ico=$this->getIco();
		$nompags=ucwords(strtolower($nompag));
		$result->bindParam(":idpag", $idpag);
		$result->bindParam(":nompag", $nompags);
		$result->bindParam(":nomarc", $nomarc);
		$result->bindParam(":mos", $mos);
		$result->bindParam(":ord", $ord);
		$result->bindParam(":ico", $ico);
		$result->execute();
	}

	function seltippara($filtro,$rvalini,$rvalfin){
		$sql= "SELECT p.idpag, p.nompag, p.nomarc, p.mos, p.ord FROM pagina as p";
		if ($filtro) 
		 	$sql .= " WHERE p.idpag='$filtro' OR p.nompag LIKE'%$filtro%'";
		$sql .= " ORDER  BY p.ord LIMIT $rvalini,$rvalfin";
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
		$sql= "SELECT count(p.idpag) AS Npe FROM pagina as p";
		if ($filtro) 
			$sql .= " WHERE p.idpag='$filtro' OR p.nompag LIKE'%$filtro%'";
		return $sql;
	}
}
?>

