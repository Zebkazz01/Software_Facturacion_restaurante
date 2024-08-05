<?php 
include("conexionm.php");


class mmenu{
	
	private $idper;
	private $idpag;

	
	//set
	function setIdper($idper){
		$this->idper=$idper;
	}
	

	function setIdpag($idpag){
		$this->idpag=$idpag;
	}

	//get
	function getIdper(){
		return $this->idper;
	}

	function getIdpag(){
		return $this->idpag;
	}

	function cons($con){
		$modelo = new conexionm();
		$conexion = $modelo->get_conexion();

		$result = $conexion->prepare($con);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	

	function consel($con){
		$modelo = new conexionm();
		$conexion = $modelo->get_conexion();	
		$result = $conexion->prepare($con);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	

	function selpag(){
		$sql="SELECT p.idpag, p.nompag, p.nomarc, p.ico FROM pagina AS p INNER JOIN pagxper AS x ON p.idpag=x.idpag WHERE x.idper=:idper AND p.mos=1 ORDER BY p.ord";
	$modelo = new conexionm();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper",$idper);
		$result->execute();
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function selarch(){
		$sql="SELECT p.idpag, p.nompag, p.nomarc FROM pagina AS p INNER JOIN pagxper AS x ON p.idpag=x.idpag WHERE x.idper=:idper AND p.idpag=:idpag";
		$modelo = new conexionm();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$idpag = $this->getIdpag();
		$result->bindParam(":idpag",$idpag);
		$result->bindParam(":idper",$idper);
		$result->execute();
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selconf(){
		$sql="SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion;";
		$modelo = new conexionm();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}
?>