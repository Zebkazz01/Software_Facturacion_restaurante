<?php 
include("conexion.php"); 

class mprov{

	function mprov(){}


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


	function selcan($idcan){
		$sql = "SELECT c.idcan, c.doccan, concat(c.nomcan,' ',c.apecan) as nom, c.nofic, f.nomfic, f.jorna, j.nomval AS jor, f.sede, s.nomval AS sed, c.ntarj, c.foto, c.tipopro, t.nomval AS tpro, c.emailsen, c.emailper, c.telfij, c.telcel FROM candidato AS c INNER JOIN ficha AS f ON c.nofic=f.nofic INNER JOIN valor AS j ON f.jorna=j.idval INNER JOIN valor AS s ON f.sede=s.idval INNER JOIN valor AS t ON c.tipopro=t.idval 
		WHERE idcan='".$idcan."';";
		//echo $sql;
		$datcan = $this->consel($sql);
		return $datcan;
	}

	function selcon(){
		$sql= "SELECT id, nomcen, nomreg, dircen FROM config";
		$datcen = $this->consel($sql);
		return $datcen;
	}

	function selval($iddom){
		$sql= "SELECT idval, iddom, nomval, parval FROM valor WHERE iddom='".$iddom."'";
		$datval = $this->consel($sql);
		return $datval;
	}

	function selpror($idcan){
		$sql = "SELECT  idcan, texpro, idval FROM propuesta WHERE idcan='".$idcan."';";
		//echo $sql;
		$data = $this->consel($sql);
		return $data;
	}

}
?>