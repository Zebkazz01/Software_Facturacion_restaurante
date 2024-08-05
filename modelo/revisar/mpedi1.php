<?php include("conexion.php");

class mpedi1{

	function mpedi1(){}

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

	function selProducto(){
		$sql = "SELECT * FROM producto inner join menudia using(codprod)";
		$data = $this->consel($sql);
		return $data;
	}


	function catexprod(){
		$sql = "SELECT * FROM categoria inner join producto using(codcat)";
		$catexprod = $this -> consel($sql);
		return $catexprod;
	}


	function categoria(){
		$sql = "SELECT * FROM categoria";
		$categoria = $this -> consel($sql);
		return $categoria;
	}

	function selDetFact($codfact){
		$sql = "SELECT * FROM detfac inner join producto using(codprod) WHERE nofact='".$codfact."'";
		//echo "Select detalle de factura".$sql;
		$selDetFact = $this -> consel($sql);
		return $selDetFact;
	}


	function verifExist($codfact,$codprod){
		$sql = "SELECT candeft FROM detfac WHERE nofact='".$codfact."' and codprod='".$codprod."'";
		//echo $sql;
		$selDetFact = $this -> consel($sql);
		return $selDetFact;
	}

	function insertDetFact($codfact,$codprod,$valorInicial){
		$sql = "INSERT INTO detfac(codprod,nofact,candeft) values('".$codprod."','".$codfact."','".$valorInicial."');";
		echo $sql;
		$this->cons($sql);
	}

	function updDetFact($codfact,$codprod,$can){
		$sql = "UPDATE detfac SET candeft='".$can."' WHERE codprod='".$codprod."' AND nofact='".$codfact."';";
		//echo $sql;
		$this->cons($sql);
	}

	function clienteFactura(){
		$sql = "SELECT nomcli,noidecli FROM cliente";
		$clienteFactura = $this ->consel($sql);
		return $clienteFactura;
	}

	function actualizarCliFactura($clienteFact,$codfact){
		$sql = "UPDATE factura SET noidecli= '".$clienteFact."' WHERE nofact='".$codfact."'";
		//echo $sql;
		$this->cons($sql);
	}



	function deleteDetFact($elim){
		$sql = "DELETE FROM detfac WHERE codprod='".$elim."' ;";
		//echo $sql;
		$this->cons($sql);
	}

	function datosFacturaModificada($mod){
		$sql = "SELECT * FROM detfac WHERE nofact='".$mod."'";
		//echo $sql;
		$datos = $this -> consel($sql);
		return $datos;
	}


	function updateFact($codfact){
		//echo "Entro a esto";
		$sql = "UPDATE factura SET estado='2', abiertafac='0' WHERE nofact='".$codfact."' ";
		//echo $sql;
		$this->cons($sql);
	}


	function valprod($codprod){
		$sql = "SELECT * FROM producto WHERE codprod='".$codprod."'";
		//echo $sql;
		$selDetFact = $this -> consel($sql);
		return $selDetFact;
	}

/*
	function updateDetFact($cantidadPost,$posicion,$codfact){
		$sql = "UPDATE detfac SET candeft='".$cantidadPost."' WHERE codprod='".$posicion."' and nofact='".$codfact."';";
		//echo $sql;
		$this->cons($sql);
	}
	*/


}

?>

