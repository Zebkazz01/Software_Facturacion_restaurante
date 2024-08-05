<?php include("conexion.php");

class mcier{
	private $numeroFactura;
	private $nofact;

	function setNumeroFactura($numeroFactura){
		$this->numeroFactura=$numeroFactura;
	}
	function setCofact($nofact){
		$this->nofact=$nofact;
	}
	function getNumeroFactura(){
		return $this->numeroFactura;
	}
	function getNofact(){
		return $this->nofact;
	}


	function selFactura(){
		$sql = "SELECT * FROM factura where abiertafac=0 and estado=3 or estado=4";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function selCliente(){
		$sql = "SELECT * FROM cliente";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function productoFactura(){
		$sql = "SELECT f.nofact,df.codprod,f.abiertafac,f.nmesa,df.candeft,pr.nomprd,pr.vlrprd FROM factura as f inner join detfac as df USING(nofact) inner join producto as pr USING(codprod) where f.estado=2 and nofact=:numeroFactura";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$numeroFactura = $this->getNumeroFactura();
		$result->bindParam(":numeroFactura",$numeroFactura);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function datosFacturaImp(){
		$sql ="SELECT d.codprod,d.nodetf,d.candeft,p.nomprd,p.vlrprd*d.candeft as valor, p.vlrprd as valor_unitario
		FROM detfac as d inner join producto as p using(codprod) where d.nofact =:nofact";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nofact = $this->getNofact();
		$result->bindParam(":nofact",$nofact);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}


	function datosEstablecimiento(){
		$sql ="SELECT * from configuracion";
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
