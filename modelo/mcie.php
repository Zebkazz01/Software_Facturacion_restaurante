<?php
include ("conexion.php");

class mcie{

//private 
private $fecinicie;
private $basecie;
private $idem;
private $act;
private $nocie;
private $fecfincie;
private $gasto;
private $efeccie;
private $totalcie;
private $descgasto;
private $efec;
private $filtro;
private $rvalini;
private $rvalfin;

//set

function setFecinicie($fecinicie){
	$this->fecinicie=$fecinicie;
}

function setBasecie($basecie){
	$this->basecie=$basecie;
}

function setIdem($idem){
	$this->idem=$idem;
}

function setAct($act){
	$this->act=$act;
}

function setNocie($nocie){
	$this->nocie=$nocie;
}

function setFecfincie($fecfincie){
	$this->fecfincie=$fecfincie;
}

function setGasto($gasto){
	$this->gasto=$gasto;
}

function setEfeccie($efeccie){
	$this->efeccie=$efeccie;
}

function setTotalcie($totalcie){
	$this->totalcie=$totalcie;
}

function setDescgasto($descgasto){
	$this->descgasto=$descgasto;
}

function setEfec($efec){
	$this->efec=$efec;
}

function setFiltro($filtro){
	$this->filtro=$filtro;
}

function setRvalini($rvalini){
	$this->rvalini=$rvalini;
}
function setRvalfin($rvalfin){
	$this->rvalfin=$rvalfin;
}

//get

function getFecinicie(){
	return $this->fecinicie;
}

function getBasecie(){
	return $this->basecie;
}

function getIdem(){
	return $this->idem;
}

function getAct(){
	return $this->act;
}

function getNocie(){
	return $this->nocie;
}

function getFecfincie(){
	return $this->fecfincie;
}

function getGasto(){
	return $this->gasto;
}

function getEfeccie(){
	return $this->efeccie;
}

function getTotalcie(){
	return $this->totalcie;
}

function getDescgasto(){
	return $this->descgasto;
}

function getEfec(){
	return $this->efec;
}

function getFiltro(){
	return $this->filtro;
}

function getRvalini(){
	return $this->rvalini;
}
function getRvalfin(){
	return $this->rvalfin;
}

		


	function insubi(){
		$fecinicie = $this->getFecinicie();
		$sql= "INSERT INTO cierre (fecinicie,fecfincie, basecie, idem, act) VALUES ('".$fecinicie."','0000-00-00 00:00:00',:basecie,:idem,:act);";
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		
		$basecie = $this->getBasecie();
		$idem = $this->getIdem();
		$act = $this->getAct();
		
		$result->bindParam(":basecie",$basecie);
		$result->bindParam(":idem",$idem);
		$result->bindParam(":act",$act);
		$result->execute();
		
	}
	
	function cieabi(){
		$sql= "SELECT c.nocie, c.fecinicie, c.fecfincie, c.basecie, c.gasto, c.efeccie, c.totalcie, c.idem, e.nomemp, c.act FROM cierre AS c INNER JOIN empleado AS e ON c.idem=e.idem WHERE c.fecfincie='0000-00-00 00:00:00' ";
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function updubi(){
		$sql= "UPDATE cierre SET fecfincie=:fecfincie,gasto=:gasto,efeccie=:efeccie,totalcie=:totalcie,act=:act,descgasto=:descgasto WHERE nocie=:nocie";
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nocie = $this->getNocie();
		$fecfincie = $this->getFecfincie();
		$gasto = $this->getGasto();
		$efeccie = $this->getEfeccie();
		$totalcie = $this->getTotalcie();
		$act = $this->getAct();
		$descgasto = $this->getDescgasto();
		$result->bindParam(":nocie",$nocie);
		$result->bindParam(":fecfincie",$fecfincie);
		$result->bindParam(":gasto",$gasto);
		$result->bindParam(":efeccie",$efeccie);
		$result->bindParam(":totalcie",$totalcie);
		$result->bindParam(":act",$act);
		$result->bindParam(":descgasto",$descgasto);
		$result->execute();
		
	}
	
	function updcie(){
		$sql= "UPDATE cierre SET act=:act;";
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$act = $this->getAct();
		$result->bindParam(":act",$act);
		$result->execute();
	
	
	}

	function delubi(){
		$sql= "DELETE FROM cierre WHERE nocie=:nocie;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nocie = $this->getNocie();
		$result->bindParam(":nocie",$nocie);
		$result->execute();
		
	}
	function updcievalor(){
		$sql= "UPDATE cierre SET totalcie=:efec WHERE nocie=:nocie;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nocie = $this->getNocie();
		$efec = $this->getEfec();
		$result->bindParam(":efec",$efec);
		$result->bindParam(":nocie",$nocie);
		$result->execute();
		
	}

	function selubi1(){
		$sql= "SELECT c.nocie, c.fecinicie, c.fecfincie, c.basecie, c.gasto, c.efeccie, c.totalcie, c.idem, e.nomemp, c.act, c.descgasto, c.basecie+c.totalcie-c.gasto AS tefec, c.efeccie-(c.basecie+c.totalcie-c.gasto) AS difer FROM cierre AS c INNER JOIN empleado AS e ON c.idem=e.idem WHERE nocie=:nocie;";
		//echo $sql."<br>";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nocie = $this->getNocie();
		$result->bindParam(":nocie",$nocie);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT c.nocie, c.fecinicie, c.fecfincie, c.basecie, c.gasto, c.efeccie, c.totalcie, c.idem, e.nomemp, c.act, c.descgasto, c.basecie+c.totalcie-c.gasto AS tefec, c.efeccie-(c.basecie+c.totalcie-c.gasto) AS difer FROM cierre AS c INNER JOIN empleado AS e ON c.idem=e.idem";
	
		if($filtro)
			$sql.= " WHERE fecinicie BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
		$sql .= "  ORDER BY fecinicie DESC LIMIT ".$rvalini.", ".$rvalfin;
		//echo $sql;
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
		$conp ="SELECT count(c.nocie) as Npe FROM cierre AS c INNER JOIN empleado AS e ON c.idem=e.idem";
		if($filtro)
			$conp.= " WHERE fecinicie BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
		return $conp;
	}

	

	function setott(){
		$sql= "SELECT sum(d.candeft*p.vlrprd) AS tot FROM factura AS f INNER JOIN detfac AS d ON f.nofact=d.nofact INNER JOIN producto AS p ON d.codprod=p.codprod WHERE f.nocie=:nocie;";
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nocie = $this->getNocie();
		$result->bindParam(":nocie",$nocie);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function sellis(){
		$sql = "SELECT f.nofact, f.fecfac, sum(d.candeft*p.vlrprd) AS total FROM factura AS f INNER JOIN detfac AS d ON f.nofact=d.nofact INNER JOIN producto AS p ON d.codprod=p.codprod WHERE nocie=:nocie GROUP BY f.nofact, f.fecfac";
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nocie = $this->getNocie();
		$result->bindParam(":nocie",$nocie);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selconf(){
		$sql="SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion;";
		//echo $sql."<br>";
		$modelo = new conexion();
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