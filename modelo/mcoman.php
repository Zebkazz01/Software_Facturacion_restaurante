<?php 
include("conexion.php");
class mcoman{

	
	private $nofact;
	private $estado;
	private $codcat;

	function setCodcat($codcat){
		$this->codcat=$codcat;
	}

	function setNofact($nofact){
		$this->nofact=$nofact;
	}
	function setEstado($estado){
		$this->estado=$estado;
	}
	function getNofact(){
		return $this->nofact;
	}
	function getEstado(){
		return $this->estado;
	}
	function getCodcat(){
		return $this->codcat;
	}

	function updest(){
		$sql= "UPDATE factura SET estado=:estado WHERE nofact=:nofact";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$estado = $this->getEstado();
		$nofact = $this->getNofact();
		$result->bindParam(":estado",$estado);
		$result->bindParam(":nofact",$nofact);
		$result->execute();
	}

	function selfac(){
		$tipe= $this->getCodcat();
		$sql= "SELECT DISTINCT  f.nofact, f.fecfac, f.abiertafac, f.noidecli, f.nocie, f.fpago, f.nvoucher, f.estado, f.nmesa, f.idem, f.notacredito, f.nloc FROM factura AS f INNER JOIN detfac AS d ON f.nofact=d.nofact INNER JOIN producto AS p ON d.codprod=p.codprod WHERE ";
		if($tipe==5) $sql.=" p.codcat=5 AND ";
		$sql.=" estado='2' ORDER BY fecfac DESC";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function seldft(){
		$tipe= $this->getCodcat();
		$sql= "SELECT d.nodetf, d.candeft, d.nofact, d.codprod, p.nomprd, p.vlrprd FROM detfac AS d INNER JOIN producto AS p ON d.codprod=p.codprod WHERE d.nofact=:nofact ";
		if($tipe==5){
				$sql.= " AND p.codcat=:codcat ";
		}else if($tipe==1){
			$sql.= " AND not p.codcat=5 ";
		}
		$sql.= " ORDER BY p.nomprd";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nofact = $this->getNofact();
		$result->bindParam(":nofact",$nofact);
		if($tipe==5) $result->bindParam(":codcat",$tipe);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}
?>