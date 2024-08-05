<?php 
include("conexion.php"); 
class mvot{

	function mvot(){}

	//SELECT  doccan, nomcan, apecan, nofic ,voto, ntarj, foto
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

    function selcan($jor){
    	$sql="SELECT c.idcan, c.doccan, c.nomcan, c.apecan, c.nofic, c.voto, c.ntarj, c.foto, f.nomfic, f.jorna, j.nomval AS jor, f.sede, s.nomval AS sed FROM candidato AS c INNER JOIN ficha AS f ON c.nofic=f.nofic INNER JOIN valor AS j ON f.jorna=j.idval INNER JOIN valor AS s ON f.sede=s.idval";
    	if($jor){
    		$sql .= " WHERE f.jorna='".$jor."' ORDER BY c.ntarj";
    	}
    	$data=$this->consel ($sql);
    	return $data;
    }

    function selcanvot($idcan){
    	$sql="SELECT voto FROM candidato WHERE idcan='".$idcan."'";
    	$data=$this->consel ($sql);
    	return $data;
    }
	function updapre($idapr){
		$sql= "UPDATE aprendiz SET  voto='1' WHERE idapr='".$idapr."';";
		//echo "<br><br>".$sql."<br><br>";
		$this->cons($sql);
	}

	function updcan($idcan, $cvo){
		$sql= "UPDATE candidato SET voto='".$cvo."' WHERE idcan='".$idcan."';";
		//echo "<br><br>".$sql."<br><br>";
		$this->cons($sql);
	}
}