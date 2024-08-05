<?php

include ("conexion.php");

class mpror{
	function mpror(){}

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

	function inspror($idcan, $texpro, $idval){
		$sql = "INSERT INTO propuesta(idcan, texpro,idval) VALUES ('".$idcan."','".$texpro."','".$idval."');";
		$this->cons($sql);
	}

	function selpror($idcan){
		$sql = "SELECT idcan, texpro, idval FROM propuesta WHERE idcan='".$idcan."';";
		$data = $this->consel($sql);
		return $data;
	}


	function selpror1($idcan){
		$sql = "SELECT texpro, idval FROM propuesta WHERE idcan='".$idcan."';";
		$data = $this->consel($sql);
		return $data;
	}

	function edipror($texpro, $idcan, $idval){
		$sql = "UPDATE propuesta SET texpro='".$texpro."' WHERE idval='".$idval."' AND idcan='".$idcan."';";
		$this->cons($sql);
	}
	function selcan($idcan){
		$sql = "SELECT c.idcan, c.doccan, concat(c.nomcan,' ',c.apecan) as nom, c.nofic, f.nomfic, f.jorna, j.nomval AS jor, f.sede, s.nomval AS sed, c.ntarj, c.foto, c.tipopro, t.nomval AS tpro, c.emailsen, c.emailper, c.telfij, c.telcel FROM candidato AS c INNER JOIN ficha AS f ON c.nofic=f.nofic INNER JOIN valor AS j ON f.jorna=j.idval INNER JOIN valor AS s ON f.sede=s.idval INNER JOIN valor AS t ON c.tipopro=t.idval 
		WHERE idcan='".$idcan."';";
		$data = $this->consel($sql);
		return $data;
	}

	function selcon(){
		$sql= "SELECT id, nomcen, nomreg, dircen FROM config";
		$data = $this->consel($sql);
		return $data;
	}

	function selval($iddom){
		$sql= "SELECT idval, iddom, nomval, parval FROM valor WHERE iddom='".$iddom."'";
		$data = $this->consel($sql);
		return $data;
	}
}

?>