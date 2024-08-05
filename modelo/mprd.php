<?php include ("conexion.php");

class Mprd{

	private $codprod;
	private $nomprd;
	private $vlrprd;
	private $codcat;
	private $cantmatxpro;
	private $idmatxpro;
	private $idmat;
		
		//Metodos SET
	function setIdmat($idmat){
		$this->idmat=$idmat;
	}
	function setCodprod($codprod){
		$this->codprod=$codprod;
	}
	function setIdmatxpro($idmatxpro){
		$this->idmatxpro=$idmatxpro;
	}
	function setCantmatxpro($cantmatxpro){
		$this->cantmatxpro=$cantmatxpro;
	}

	function setNomprd($nomprd){
		$this->nomprd=$nomprd;
	}

	function setVlrprd($vlrprd){
		$this->vlrprd=$vlrprd;
	}
	function setCodcat($codcat){
		$this->codcat=$codcat;
	}

		//Metodos GET
	function getIdmat(){
		return $this->idmat;
	}
	function getIdmatxpro(){
		return $this->idmatxpro;
	}
	function getCantmatxpro(){
		return $this->cantmatxpro;
	}
	function getCodprod(){
		return $this->codprod;
	}
	function getNomprd(){
		return $this->nomprd;
	}
	function getVlrprd(){
		return $this->vlrprd;
	}
	function getCodcat(){
		return $this->codcat;
	}	
		
	

//SELECT codprod, nomprd, vlrprd, codcat FROM producto
	function insubi(){
		$sql= "INSERT INTO producto (nomprd, vlrprd, codcat) VALUES (:nomprd, :vlrprd, :codcat);";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nomprd = $this->getNomprd();
		$result->bindParam(":nomprd", $nomprd);
		$vlrprd = $this->getVlrprd();
		$result->bindParam(":vlrprd", $vlrprd);
		$codcat = $this->getCodcat();
		$result->bindParam(":codcat", $codcat);
		$result->execute();
	}

	function insmxp(){
		$sql= "INSERT INTO matxpro(idmat, codprod, cantmatxpro) VALUES (:idmat, :codprod, :cantmatxpro);";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idmat = $this->getIdmat();
		$result->bindParam(":idmat", $idmat);
		$codprod = $this->getCodprod();
		$result->bindParam(":codprod", $codprod);
		$cantmatxpro = $this->getCantmatxpro();
		$result->bindParam(":cantmatxpro", $cantmatxpro);
		$result->execute();
	}

	function updubi(){
		$sql= "UPDATE producto SET nomprd=:nomprd,vlrprd=:vlrprd,codcat=:codcat WHERE codprod=:codprod ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$codprod = $this->getCodprod();
		$result->bindParam(":codprod", $codprod);
		$nomprd = $this->getNomprd();
		$result->bindParam(":nomprd", $nomprd);
		$vlrprd = $this->getVlrprd();
		$result->bindParam(":vlrprd", $vlrprd);
		$codcat = $this->getCodcat();
		$result->bindParam(":codcat", $codcat);
		$result->execute();
	}

	function delubi(){
		$sql= "DELETE FROM producto WHERE codprod=:codprod ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$codprod = $this->getCodprod();
		$result->bindParam(":codprod", $codprod);

		$result->execute();
	}
	function delmxp(){
		$sql= "DELETE FROM matxpro WHERE idmatxpro=:idmatxpro ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idmatxpro = $this->getIdmatxpro();
		$result->bindParam(":idmatxpro", $idmatxpro);
		$result->execute();
	}

	function selubi1(){
		$sql= "SELECT codprod, nomprd, vlrprd, codcat FROM producto WHERE codprod=:codprod ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);

		$codprod = $this->getCodprod();
		$result->bindParam(":codprod",$codprod);
		
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT p.codprod, p.nomprd, p.vlrprd, p.codcat, c.nomcat FROM producto as p INNER JOIN categoria AS c ON p.codcat=c.codcat";
		if($filtro)
			$sql.= " WHERE p.nomprd LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY c.nomcat, p.nomprd LIMIT ".$rvalini.", ".$rvalfin;
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
		$conp ="SELECT count(p.codprod) as Npe FROM producto as p INNER JOIN categoria AS c ON p.codcat=c.codcat";
		if($filtro)
			$conp.= " WHERE p.nomprd LIKE '%".$filtro."%'";
		return $conp;
	}
	function selcat(){
		$sql= "SELECT codcat, nomcat FROM categoria";
		//echo ($sql);
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
	function selmat(){
		$sql= "SELECT idmat, nommatp, vlrmatp FROM materiap";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
		
	}

	function selmxp(){
		$sql= "SELECT p.codprod, x.idmatxpro, x.idmat, x.cantmatxpro, m.nommatp, m.vlrmatp FROM producto AS p INNER JOIN matxpro AS x ON p.codprod=x.codprod INNER JOIN materiap AS m ON x.idmat=m.idmat WHERE p.codprod=:codprod ";
		//echo ($sql);
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$codprod = $this->getCodprod();
		$result->bindParam(":codprod", $codprod);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}
?>