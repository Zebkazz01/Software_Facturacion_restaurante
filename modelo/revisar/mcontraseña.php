<?php 
include("conexion.php"); 
	
class mcontraseña{

	function mcontraseña(){}

	//SELECT idadm, docadm, noming, passadm FROM admin
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

	function perfil(){
		$sql ="SELECT * FROM perfil;";
		$data = $this->consel($sql);
		//echo $sql;
		return $data;
	}



}
?>