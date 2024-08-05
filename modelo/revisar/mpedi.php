<?php include("conexion.php");

class mpedi{
	function mpedi(){}

	function cons($con){
		$cnbd = new conexion();
		$cnbd->conectarBD();
		$cnbd->ejeCon($con,1);
	}
	function consel($con){
		$cnbd = new conexion();
		$cnbd->conectarBD();
		$resu = $cnbd->ejeCon($con,0);
		return $resu;
	}

	function insertFactura($nmesas,$idem){
		$sql = "INSERT INTO factura(estado,nmesa,idem,abiertafac,noidecli) values('1','".$nmesas."','".$idem."','0','1');";
		//echo $sql;
		$this->cons($sql);
	}

	function facturasAbiertas($idem,$idper){
		if($idper==3){
			$sql = "SELECT nofact,nmesa,estado,idem FROM factura where estado<2 and abiertafac=0 and idem='".$idem."'";
			echo $sql;
			$facturasAbiertas = $this->consel($sql);
			return $facturasAbiertas;
		}else{
			$sql = "SELECT nofact,nmesa,estado,idem,emp.nomemp FROM factura fact inner join empleado emp using(idem) where abiertafac=0 and estado<4";
			//echo $sql;
			$facturasAbiertas = $this->consel($sql);
			return $facturasAbiertas;
		}
	}

	function cancelarFactura($elim){
		$sql = "DELETE FROM detfac WHERE nofact IN(select nofact from factura where nofact='".$elim."');";
		//echo $sql;
		$this->cons($sql);
		$sql = "DELETE FROM factura WHERE nofact='".$elim."';";
		//echo $sql;
		$this->cons($sql);
	}

	function anularFactura($up,$nota){
		$sql = "UPDATE factura SET estado='5',notacredito='".$nota."' WHERE nofact='".$up."'";
		echo $sql;
		$this->cons($sql);
	}

	function datosAjus(){
		$sql = "SELECT * FROM configuracion";
		$datosAjus = $this->consel($sql);
		return $datosAjus;
	}

	function hacerPedido(){
		$sql = "SELECT * FROM factura order by nofact desc limit 1";
		$ultimaFactura = $this -> consel($sql);
		return $ultimaFactura;
	}

	function mesasOcuapadas(){
		$sql = "SELECT * FROM factura where estado>=2 and estado<5 and abiertafac=0";
		$mesasOcuapadas = $this -> consel($sql);
		return $mesasOcuapadas;
	}

	



}
?>