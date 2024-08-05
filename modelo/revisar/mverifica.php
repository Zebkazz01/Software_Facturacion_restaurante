<?php 
include("conexion.php"); 
$pg = 1005;
class mverifica{

	function mverifica(){}


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

		function selapre(){
		$sql= "SELECT * FROM aprendiz;";
		$data = $this->consel($sql);
		return $data;
	}


	

}
?>