<?php include("modelo/conexion.php");

class mperf{

private  $idpag;
private $idper;
private $nomper;

function setIdpag($idpag){
	$this ->idpag=$idpag;
}
function setIdper($idper){
	$this ->idper=$idper;
}
function setNomper($nomper){
	$this ->nomper=$nomper;
}

function getIdpag(){
	return $this ->idpag;
}
function getIdper(){
	return $this ->idper;
}
function getNomper(){
	return $this ->nomper;
}


	function insper(){
		$sql = "INSERT INTO perfil (nomper) VALUES (:nomper)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);	
		$nomper=$this ->getNomper();
		$result -> bindParam(":nomper", $nomper);
		$result->execute();
	}
	function inspp(){
		$sql = "INSERT INTO pagxper(idpag, idper) VALUES (:idpag, :idper)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);	
		$idpag=$this ->getIdpag();
		$idper=$this ->getIdper();
		$result -> bindParam(":idpag", $idpag);
		$result -> bindParam(":idper", $idper);
		$result->execute();
	}
	function delpp(){
		$sql = "DELETE FROM pagxper WHERE idper=:idper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper",$idper);
		$result->execute();
	}
	function selpp(){
		$sql = "SELECT idpag, idper FROM pagxper WHERE idper=:idper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);	
		$idper=$this->getIdper();
		$result -> bindParam(":idper", $idper);
		$result->execute(); 
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
    function selpag(){
    	$sql = "SELECT nompag,idpag FROM pagina ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }
    function selper(){
    	$sql = "SELECT idper,nomper FROM perfil";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }
    function selperf(){
		$sql= "SELECT idper,nomper FROM perfil WHERE idper=:idper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);	
		$idper=$this ->getIdper();
		$result -> bindParam(":idper", $idper);
		$result->execute(); 
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
  
    function updper(){
		$sql = "UPDATE perfil SET nomper=:nomper, WHERE idper=:idper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);	
		$idper= $this ->getIdper();
		$nomper= $this ->getNomper();
		$result -> bindParam(":idper", $idper);
		$result -> bindParam(":nomper", $nomper);
		$result->execute(); 
	}
	
    function deleper(){
        $sql = "DELETE FROM perfil WHERE idper=:idper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper",$idper);
		$result->execute();
    }
}
?>