<?php
include ("conexion.php");

class mrcif{
	
	private $nofact;
	private $fecfac;
	private $abiertafac;
	private $noidecli;
	private $nocie;
	private $fpago;
	private $nvoucher;
	private $estado;
	private $nmesa;
	private $idem;
	private $notacredito;
	private $nlo;
	private $docemp;


	//Metodos SET
	function setDocemp($docemp){
		$this->docemp=$docemp;
	}
	function setNofact($nofact){
		$this->nofact=$nofact;
	}
	function setFecfac($fecfac){
		$this->fecfac=$fecfac;
	}
	function setAbiertafac($abiertafac){
		$this->abiertafac=$abiertafac;
	}
	function setNoidecli($noidecli){
		$this->noidecli=$noidecli;
	}
	function setNocie($nocie){
		$this->nocie=$nocie;
	}
	function setFpago($fpago){
		$this->fpago=$fpago;
	}
	function setNvoucher($nvoucher){
		$this->nvoucher=$nvoucher;
	}
	function setEstado($estado){
		$this->estado=$estado;
	}
	function setNmesa($nmesa){
		$this->nmesa=$nmesa;
	}
	function setIdem($idem){
		$this->idem=$idem;
	}
	function setNotacredito($notacredito){
		$this->notacredito=$notacredito;
	}
	function setNlo($nlo){
		$this->nlo=$nlo;
	}

	//Metodos GET
	function getDocemp(){
		return $this->docemp;
	}
	function getNofact(){
		return $this->nofact;
	}
	function getFecfac(){
		return $this->fecfac;
	}
	function getAbiertafac(){
		return $this->abiertafac;
	}
	function getNoidecli(){
		return $this->noidecli;
	}
	function getNocie(){
		return $this->nocie;
	}
	function getFpago(){
		return $this->fpago;
	}
	function getNvoucher(){
		return $this->nvoucher;
	}
	function getEstado(){
		return $this->estado;
	}
	function getNmesa(){
		return $this->nmesa;
	}
	function getIdem(){
		return $this->idem;
	}
	function getNotacredito(){
		return $this->notacredito;
	}
	function getNlo(){
		return $this->nlo;
	}


	function selfac(){
		$sql= "SELECT nofact FROM factura WHERE fecfac=:fecfac AND abiertafac=:abiertafac AND noidecli=:noidecli AND nocie=:nocie AND docemp=:docemp ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);

		$fecfac = $this->getFecfac();
		$result->bindParam(":fecfac", $fecfac);
		$abiertafac = $this->getAbiertafac();
		$result->bindParam(":abiertafac", $abiertafac);
		$noidecli = $this->getNoidecli();
		$result->bindParam(":noidecli", $noidecli);
		$nocie = $this->getNocie();
		$result->bindParam(":nocie", $nocie);
		$docemp = $this->getDocemp();
		$result->bindParam(":docemp", $docemp);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;



	}

	function cieabi(){
		$sql= "SELECT c.nocie, c.fecinicie, c.fecfincie, c.basecie, c.efeccie, c.totalcie, c.act FROM cierre AS c WHERE c.act=2";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function seldfTot(){
		$sql= "SELECT sum(p.vlrprd) AS total FROM detfac AS d INNER JOIN producto AS p ON d.codprd=p.codprd WHERE d.nofact=:nofact ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nofact = $this->getNofact();
		$result->bindParam(":nofact", $nofact);
		
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selubi1(){
		$sql= "SELECT f.nofact, f.fecfac, f.abiertafac, f.noidecli, f.nocie, e.docemp, e.nomemp, c.nodoccli, c.nomcli, c.dircli, c.telcli, c.emailcli, c.codubi, u.nomubi, f.fpago, f.nvoucher, f.nloc FROM empleado AS e INNER JOIN factura AS f ON e.docemp=f.docemp INNER JOIN cliente AS c ON f.noidecli=c.noidecli INNER JOIN ubicacion AS u ON c.codubi=u.codubi WHERE f.nofact=:nofact ";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nofact = $this->getNofact();
		$result->bindParam(":nofact", $nofact);
		
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function infcieT($filtro){
		$sql = "SELECT sum(basecie) AS Base, sum(gasto) AS Gast, sum(efeccie) AS Efct, sum(totalcie) AS tdin, (sum(basecie)+sum(totalcie)-sum(gasto)) AS Tcie, (sum(efeccie)-(sum(basecie)+sum(totalcie)-sum(gasto))) AS Tdif FROM cierre";
		if($filtro)
			$sql.= " WHERE nocie='".$filtro."' AND act=2";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$result->execute();
			$res = NULL;
			while($f=$result->fetch())
				$res[]=$f;
			return $res;	
	}


	function difpag(){
		$sql = "SELECT f.nocie, f.fpago, sum(p.vlrprd) AS vlrfac FROM factura AS f INNER JOIN detfac AS d ON f.nofact=d.nofact INNER JOIN producto AS p ON d.codprod=p.codprod";
		$sql.= " GROUP BY f.nocie, f.fpago";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		
		
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
		// $data=$this->consel($sql);
		// return $data;
	}

	function buscart($filtro1,$filtro2){
		$sql = "SELECT sum(basecie) AS Base, sum(gasto) AS Gast, sum(totalcie) AS tdin, sum(efeccie) AS Efct, (sum(basecie)+sum(totalcie)-sum(gasto)) AS Tcie, (sum(efeccie)-(sum(basecie)+sum(totalcie)-sum(gasto))) AS Tdif FROM cierre";
		if($filtro1 && $filtro2)
			$sql.= " WHERE fecinicie>='".$filtro1."' AND fecfincie<='".$filtro2."'";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			
			
			$result->execute();
			$res = NULL;
			while($f=$result->fetch())
				$res[]=$f;
			return $res;
	}

	function buscar($filtro1,$filtro2,$rvalini,$rvalfin){
		$sql = "SELECT nocie, fecinicie, fecfincie, basecie, gasto, totalcie, efeccie, (basecie+totalcie-gasto) AS Tcie, (efeccie-(basecie+totalcie-gasto)) AS Tdif FROM cierre";
		if($filtro1 && $filtro2)
			$sql.= " WHERE fecinicie>='".$filtro1."' AND fecfincie<='".$filtro2."'";
		$sql .= "  LIMIT ".$rvalini.", ".$rvalfin;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function buscarp($filtro1,$filtro2){
		$sql = "SELECT nocie, fecinicie, fecfincie, descgasto, basecie, gasto, totalcie, efeccie, (basecie+totalcie-gasto) AS Tcie, (efeccie-(basecie+totalcie-gasto)) AS Tdif FROM cierre";
		if($filtro1 && $filtro2)
			$sql.= " WHERE fecinicie>='".$filtro1."' AND fecfincie<='".$filtro2."'";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$result->execute();
			$res = NULL;
			while($f=$result->fetch())
				$res[]=$f;
			return $res;
	}

	
	function sqlcount($filtro1,$filtro2){
		$conp ="SELECT count(basecie) as Npe FROM cierre";
		if($filtro1 && $filtro2)
			$conp.= " WHERE fecinicie>='".$filtro1."' AND fecfincie<='".$filtro2."'";
		return $conp;
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

