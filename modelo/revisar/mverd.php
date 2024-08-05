<?php 
include("conexion.php"); 

class mverd{

	function mverd(){}

	function consel($con){
		$cnbd = new conexion();
		$cnbd->conectarBD();
		$resu = $cnbd->ejeCon($con,0);
		return $resu;
	}

	function selapr($idapr){
		$sql = "SELECT a.idapr, a.docapr, a.nomapr, a.nofic, f.nomfic, f.jorna, j.nomval as jor, s.nomval as sede  
					FROM aprendiz a INNER JOIN ficha f ON a.nofic=f.nofic 
					INNER JOIN valor j ON f.jorna=j.idval 
					INNER JOIN valor s ON f.sede=s.idval  
				WHERE idapr = '".$idapr."'";
		//echo $sql;
		$data = $this->consel($sql);
		return $data;
	}

}
?>