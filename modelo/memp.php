<?php
include ("conexion.php");

class memp{
	
	private $idem;
	private $nodocemp;
	private $nomemp;
	private $diremp;
	private $telemp;
	private $pass;
	private $idper;
	private $actemp;

	function setIdem($idem){
		$this->idem=$idem;
	}
	function setNodocemp($nodocemp){
		$this->nodocemp=$nodocemp;
	}
	function setNomemp($nomemp){
		$this->nomemp=$nomemp;
	}
	function setDiremp($diremp){
		$this->diremp=$diremp;
	}
	function setTelemp($telemp){
		$this->telemp=$telemp;
	}
	function setPass($pass){
		$this->pass=$pass;
	}
	function setIdper($idper){
		$this->idper=$idper;
	}
	function setActemp($actemp){
		$this->actemp=$actemp;
	}	
	function getIdem(){
		return $this->idem;
	}
	function getNodocemp(){
		return $this->nodocemp;
	}
	function getNomemp(){
		return $this->nomemp;
	}
	function getDiremp(){
		return $this->diremp;
	}
	function getTelemp(){
		return $this->telemp;
	}
	function getPass(){
		return $this->pass;
	}
	function getIdper(){
		return $this->idper;
	}
	function getActemp(){
		return $this->actemp;
	}
	function cons($con){
		$cnbd = new conexion();
	
		$cnbd->ejeCon($con,1);
	}
//SELECT idem, nodocemp, nomemp, idper, pass, diremp, telemp, actemp FROM empleado
	function insubi(){
		$sql= "INSERT INTO empleado (nodocemp, nomemp, diremp, telemp, pass, idper, actemp) VALUES (:nodocemp, :nomemp, :diremp, :telemp, :pass, :idper, :actemp);";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nodocemp = $this->getNodocemp();
		$nomemp = $this->getNomemp();
		$diremp = $this->getDiremp();
		$telemp = $this->getTelemp();
		$pass = $this->getPass();
		$idper = $this->getIdper();
		$actemp = $this->getActemp();
		$result->bindParam(":nodocemp",$nodocemp);
		$result->bindParam(":nomemp",$nomemp);
		$result->bindParam(":diremp",$diremp);
		$result->bindParam(":telemp",$telemp);
		$result->bindParam(":pass",$pass);
		$result->bindParam(":idper",$idper);
		$result->bindParam(":actemp",$actemp);
		$result->execute();
	}

	function updhab(){
		$sql= "UPDATE empleado SET actemp=:actemp WHERE idem=:idem";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idem = $this->getIdem();
		$actemp = $this->getActemp();
		$result->bindParam(":idem",$idem);
		$result->bindParam(":actemp",$actemp);
		$result->execute();
	}

	function updubi(){
		$sql= "UPDATE empleado SET nodocemp=:nodocemp,nomemp=:nomemp,idper=:idper,pass=:pass,diremp=:diremp,telemp=:telemp,actemp=:actemp WHERE idem=:idem";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idem = $this->getIdem();
		$nodocemp = $this->getNodocemp();
		$nomemp = $this->getNomemp();
		$diremp = $this->getDiremp();
		$telemp = $this->getTelemp();
		$pass = $this->getPass();
		$idper = $this->getIdper();
		$actemp = $this->getActemp();
		$result->bindParam(":idem",$idem);
		$result->bindParam(":nodocemp",$nodocemp);
		$result->bindParam(":nomemp",$nomemp);
		$result->bindParam(":diremp",$diremp);
		$result->bindParam(":telemp",$telemp);
		$result->bindParam(":pass",$pass);
		$result->bindParam(":idper",$idper);
		$result->bindParam(":actemp",$actemp);
		$result->execute();
	}

	function updubis(){
		$sql= "UPDATE empleado SET nodocemp=:nodocemp,nomemp=:nomemp,idper=:idper,diremp=:diremp,telemp=:telemp,actemp=:actemp WHERE idem=:idem";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idem = $this->getIdem();
		$nodocemp = $this->getNodocemp();
		$nomemp = $this->getNomemp();
		$diremp = $this->getDiremp();
		$telemp = $this->getTelemp();
		$idper = $this->getIdper();
		$actemp = $this->getActemp();
		$result->bindParam(":idem",$idem);
		$result->bindParam(":nodocemp",$nodocemp);
		$result->bindParam(":nomemp",$nomemp);
		$result->bindParam(":diremp",$diremp);
		$result->bindParam(":telemp",$telemp);
		$result->bindParam(":idper",$idper);
		$result->bindParam(":actemp",$actemp);
		$result->execute();
	}

	function delubi(){
		$sql= "DELETE FROM empleado WHERE idem=:idem";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idem = $this->getIdem();
		$result->bindParam(":idem",$idem);
		$result->execute();
	}
/*SELECT nodocemp, nomemp, diremp, telemp, pass, idper, actemp FROM empleado*/
	function selubi1(){
		$sql= "SELECT idem, nodocemp, nomemp, diremp, telemp, pass, idper, actemp FROM empleado WHERE idem=:idem";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idem = $this->getIdem();
		$result->bindParam(":idem",$idem);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selper(){
		$sql= "SELECT idper, nomper FROM perfil ORDER BY idper DESC;";
		$cnbd = new conexion();
	
		$data= $cnbd->ejeCon($sql,0);
		return $data;
	}
	
	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT e.idem, e.nodocemp, e.nomemp, e.diremp, e.telemp, e.pass, e.idper, p.nomper, e.actemp FROM empleado AS e INNER JOIN perfil AS p ON e.idper=p.idper";
		if($filtro)
			$sql.= " WHERE e.nomemp LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY e.nomemp LIMIT ".$rvalini.", ".$rvalfin;
		$conexionDB=new conexion();
	
		$data=$conexionDB->ejeCon($sql, 0);
		return $data;
	}
	
	function sqlcount($filtro){
		$conp ="SELECT count(e.idem) as Npe FROM empleado AS e INNER JOIN perfil AS p ON e.idper=p.idper";
		if($filtro)
			$conp.= " WHERE e.nomemp LIKE '%".$filtro."%'";
		return $conp;
	}
}
?>