<?php
include ("conexion.php");

class mcie{
	private $fecini;
	private $fecfin;
	private $act;
	private $idmat;
	private $idkardex;
	private $tipo;
	private $cantid;
	private $descrip;
	private $imp;

	function setFecini($fecini){
		$this->fecini=$fecini;
	}
	function setFecfin($fecfin){
		$this->fecfin=$fecfin;
	}
	function setAct($act){
		$this->act=$act;
	}
	function setIdmat($idmat){
		$this->idmat=$idmat;
	}
	function setIdkardex($idkardex){
		$this->idkardex=$idkardex;
	}
	function setTipo($tipo){
		$this->tipo=$tipo;
	}
	function setCantid($cantid){
		$this->cantid=$cantid;
	}
	function setDescrip($descrip){
		$this->descrip=$descrip;
	}
	function setImp($imp){
		$this->imp=$imp;
	}
	function getFecini(){
		return $this->fecini;
	}
	function getFecfin(){
		return $this->fecfin;
	}
	function getAct(){
		return $this->act;
	}
	function getIdmat(){
		return $this->idmat;
	}
	function getIdkardex(){
		return $this->idkardex;
	}
	function getTipo(){
		return $this->tipo;
	}
	function getCantid(){
		return $this->cantid;
	}
	function getDescrip(){
		return $this->descrip;
	}
	function getImp(){
		return $this->imp;
	}
//SELECT idkardex, fecini, fecfin, act FROM kardex
	function insubi(){
		$sql= "INSERT INTO kardex (fecini, act) VALUES (:fecini, :act)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$fecini=$this->getFecini();
		$act=$this->getAct();
		$result->bindParam(":fecini",$fecini);
		$result->bindParam(":act",$act);
		$result->execute();
	}

	function insdkar(){
		$sql= "INSERT INTO detkar(idmat, idkardex, tipo, cantid, descrip) VALUES (:idmat, :idkardex, :tipo, :cantid, :descrip)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idmat=$this->getIdmat();
		$idkardex=$this->getIdkardex();
		$tipo=$this->getTipo();
		$cantid=$this->getCantid();
		$descrip=$this->getDescrip();
		$result->bindParam(":idmat",$idmat);
		$result->bindParam(":idkardex",$idkardex);
		$result->bindParam(":tipo",$tipo);
		$result->bindParam(":cantid",$cantid);
		$result->bindParam(":descrip",$descrip);
		$result->execute();
	}
	
	function cieabi(){
		$sql= "SELECT idkardex, fecini, fecfin, act FROM kardex WHERE act=1";
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
		$sql= "UPDATE kardex SET fecfin=:fecfin,act=:act WHERE idkardex=:idkardex";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$fecfin=$this->getFecfin();
		$idkardex=$this->getIdkardex();
		$act=$this->getAct();
		$result->bindParam(":fecfin",$fecfin);
		$result->bindParam(":idkardex",$idkardex);
		$result->bindParam(":act",$act);
		$result->execute();
	}
	
	function updcie(){
		$sql= "UPDATE kardex SET act=:act";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$act=$this->getAct();
		$result->bindParam(":act",$act);
		$result->execute();
	}

	function delubi(){
		$sql= "DELETE FROM kardex WHERE idkardex=:idkardex";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idkardex=$this->getIdkardex();
		$result->bindParam(":idkardex",$idkardex);
		$result->execute();
	}

	function selubi1(){
		$sql= "SELECT idkardex, fecini, fecfin, act FROM kardex WHERE idkardex=:idkardex";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idkardex=$this->getIdkardex();
		$result->bindParam(":idkardex",$idkardex);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selkar1(){
		$sql= "SELECT idkardex FROM kardex WHERE fecini=:fecini AND act=:act";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$fecini=$this->getFecini();
		$result->bindParam(":fecini",$fecini);
		$act=$this->getAct();
		$result->bindParam(":act",$act);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selkarant(){
		$sql = "SELECT idkardex, max(fecfin) as maxfec FROM kardex";
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
		$sql = "SELECT idkardex, fecini, fecfin, act FROM kardex";
		if($filtro)
			$sql.= " WHERE fecini BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
		$sql .= "  ORDER BY fecini DESC LIMIT ".$rvalini.", ".$rvalfin;
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
		$conp ="SELECT count(idkardex) as Npe FROM kardex";
		if($filtro)
			$conp.= " WHERE fecini BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
		return $conp;
	}

	function selkard(){
		$sql = "SELECT d.idmat, m.nommatp FROM detkar AS d INNER JOIN materiap AS m ON d.idmat=m.idmat WHERE d.idkardex=:idkardex GROUP BY d.idmat, m.nommatp ORDER BY m.nommatp";
		//echo $sql."<br>";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idkardex=$this->getIdkardex();
		$result->bindParam(":idkardex",$idkardex);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function consel($sql){
		$sql= "SELECT codprod, nomprd, vlrprd, codcat FROM producto WHERE codprod=:codprod ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function selcomen($idmat, $idkardex, $imp){
		$sql = "SELECT iddet, cantid, tipo, descrip FROM detkar WHERE idmat='".$idmat."' AND idkardex='".$idkardex."'";
		//echo $sql."<br>";
		$data = $this->consel($sql);
		$comen = "";
		for($i=0;$i<count($data);$i++){
			if($data[$i]["descrip"]){
				$comen = $comen."&nbsp;Can:".$data[$i]["cantid"]." - Tipo:".$data[$i]["tipo"]." - ".$data[$i]["descrip"];
				if($imp==1){
					$comen .= "&#10;";
				}else{
					$comen .= "<br>";
				}
			}
		}
		return $comen;
	}

	function setott(){
		$sql= "SELECT sum(d.cantid) AS tot FROM kardex AS k INNER JOIN detkar AS d ON k.idkardex=d.idkardex INNER JOIN materiap AS p ON d.idmat=p.idmat WHERE k.idkardex=:idkardex AND d.tipo=:tipo";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idkardex=$this->getIdkardex();
		$result->bindParam(":idkardex",$idkardex);
		$tipo=$this->getTipo();
		$result->bindParam(":tipo",$tipo);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function seltcan(){
		$sql = "SELECT sum(cantid) AS can FROM detkar WHERE idmat=:idmat AND idkardex=:idkardex AND tipo=:tipo";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idkardex=$this->getIdkardex();
		$result->bindParam(":idkardex",$idkardex);
		$tipo=$this->getTipo();
		$result->bindParam(":tipo",$tipo);
		$idmat=$this->getIdmat();
		$result->bindParam(":idmat",$idmat);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selmtp(){
		$sql= "SELECT idmat, nommatp, vlrmatp FROM materiap;";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selconf(){
		$sql="SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion;";
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