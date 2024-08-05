<?php include("conexion.php");


class majus{

    	
	private $idconf;
	private $nummesas;
	private $tiemact;
	private $nit;
	private $nomrest;
	private $dircon;
	private $mosdir;
	private $telcon;
	private $mostel;
	private $celcon;
	private $moscel;
	private $emacon;
	private $mosema;
	private $logocon;

	function setIdconf($idconf){
		$this ->idconf=$idconf;
	}
	function setNummesas($nummesas){
		$this ->nummesas=$nummesas;
	}
	function setTiemact($tiemact){
		$this ->tiemact=$tiemact;
	}
	function setNit($nit){
		$this ->nit=$nit;
	}
	function setNomrest($nomrest){
		$this ->nomrest=$nomrest;
	}
	function setDircon($dircon){
		$this ->dircon=$dircon;
	}
	function setMosdir($mosdir){
		$this ->mosdir=$mosdir;
	}
	function setTelcon($telcon){
		$this ->telcon=$telcon;
	}
	function setMostel($mostel){
		$this ->mostel=$mostel;
	}
	function setCelcon($celcon){
		$this ->celcon=$celcon;
	}
	function setMoscel($moscel){
		$this ->moscel=$moscel;
	}
	function setEmacon($emacon){
		$this ->emacon=$emacon;
	}
	function setMosema($mosema){
		$this ->mosema=$mosema;
	}
	function setLogocon($logocon){
		$this ->logocon=$logocon;
	}

///////////////////////////////////////////////////////////////////////////////
function getIdconf(){
	return $this ->idconf;
}
function getNummesas(){
	return $this ->nummesas;
}
function getTiemact(){
	return $this ->tiemact;
}
function getNit(){
	return $this ->nit;
}
function getNomrest(){
	return $this ->nomrest;
}
function getDircon(){
	return $this ->dircon;
}
function getMosdir(){
	return $this ->mosdir;
}
function getTelcon(){
	return $this ->telcon;
}
function getMostel(){
	return $this ->mostel;
}
function getCelcon(){
	return $this ->celcon;
}
function getMoscel(){
	return $this ->moscel;
}
function getEmacon(){
	return $this ->emacon;
}
function getMosema(){
	return $this ->mosema;
}
function getLogocon(){
	return $this ->logocon;
}



	//SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion
	
		function insertConfig(){
			$sql = "INSERT INTO configuracion( nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon) values(:nummesas, :tiemact, :nit, :nomrest, :dircon, :mosdir, :telcon, :mostel, :celcon, :moscel, :emacon, :mosema, :logocon)";
			//echo $sql;
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
				$nummesas= $this -> getNummesas();
				$tiemact= $this -> getTiemact();
				$nit= $this -> getNit();
				$nomrest= $this -> getNomrest();
				$dircon= $this -> getDircon();
				$mosdir= $this -> getMosdir();
				$telcon= $this -> getTelcon();
				$mostel= $this -> getMostel();
				$celcon= $this -> getCelcon();
				$moscel= $this -> getMoscel();
				$emacon= $this -> getEmacon();
				$mosema= $this -> getMosema();
				$logocon= $this -> getLogocon();

				$result->bindParam(":nummesas", $nummesas);
				$result->bindParam(":tiemact", $tiemact);
				$result->bindParam(":nit", $nit);
				$result->bindParam(":nomrest", $nomrest);
				$result->bindParam(":dircon", $dircon);
				$result->bindParam(":mosdir", $mosdir);
				$result->bindParam(":telcon", $telcon);
				$result->bindParam(":mostel", $mostel);
				$result->bindParam(":celcon", $celcon);
				$result->bindParam(":moscel", $moscel);
				$result->bindParam(":emacon", $emacon);
				$result->bindParam(":mosema", $mosema);
				$result->bindParam(":logocon", $logocon);
			$result->execute();
		}

		function updateConfig(){
			$sql = "UPDATE configuracion SET nummesas=:nummesas, tiemact=:tiemact, nit=:nit, nomrest=:nomrest, dircon=:dircon, mosdir=:mosdir, telcon=:telcon, mostel=:mostel, celcon=:celcon, moscel=:moscel, emacon=:emacon, mosema=:mosema, logocon=:logocon WHERE idconf=:idconf;";
			//echo $sql;
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);

			$idconf= $this -> getIdconf();
			$nummesas= $this -> getNummesas();
			$tiemact= $this -> getTiemact();
			$nit= $this -> getNit();
			$nomrest= $this -> getNomrest();
			$dircon= $this -> getDircon();
			$mosdir= $this -> getMosdir();
			$telcon= $this -> getTelcon();
			$mostel= $this -> getMostel();
			$celcon= $this -> getCelcon();
			$moscel= $this -> getMoscel();
			$emacon= $this -> getEmacon();
			$mosema= $this -> getMosema();
			$logocon= $this -> getLogocon();

			$result->bindParam(":idconf", $idconf);
			$result->bindParam(":nummesas", $nummesas);
			$result->bindParam(":tiemact", $tiemact);
			$result->bindParam(":nit", $nit);
			$result->bindParam(":nomrest", $nomrest);
			$result->bindParam(":dircon", $dircon);
			$result->bindParam(":mosdir", $mosdir);
			$result->bindParam(":telcon", $telcon);
			$result->bindParam(":mostel", $mostel);
			$result->bindParam(":celcon", $celcon);
			$result->bindParam(":moscel", $moscel);
			$result->bindParam(":emacon", $emacon);
			$result->bindParam(":mosema", $mosema);
			$result->bindParam(":logocon", $logocon);
			$result->execute();
		
		}

		function configura(){
			$sql = "SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion";
			$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
		}

		function deletAjus(){
			$sql = "DELETE FROM configuracion where idconf=:idconf;";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$idconf = $this->getIdconf();
			$result->bindParam(":idconf",$idconf);
			$result->execute();
		}
}
?>