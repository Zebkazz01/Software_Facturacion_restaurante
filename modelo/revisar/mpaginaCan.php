<?php 
include("conexion.php"); 

class mpaginaCan{

	function mpaginaCan(){}

	function consel($con){
		$cnbd = new conexion();
		$cnbd->conectarBD();
		$resu = $cnbd->ejeCon($con,0);
		return $resu;
	}
	 
	function selcan($idJornada){
		//echo $idJornada;
		$sql= "SELECT * from candidato inner join ficha f using(nofic) inner join dominio d on(f.jorna=d.iddom) where f.jorna = '".$idJornada."';";
		//echo $sql;
		$data = $this->consel($sql);
		return $data;
	}
}
?>