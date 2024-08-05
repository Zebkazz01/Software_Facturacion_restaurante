<?php 
include("conexion.php"); 

class ming{


	//SELECT idadm, docadm, noming, passadm FROM admin
	
	function perfil(){
		$sql ="SELECT * FROM perfil;";
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