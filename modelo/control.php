<?php
session_start();
include ("conexion.php");
  
$user= isset ($_POST["nomusuario"])? $_POST["nomusuario"]:NULL;
$pass= isset ($_POST["conusuario"])? $_POST["conusuario"]:NULL;
insper($user, $pass);

function insper($user, $pass){
	if($user && $pass){
		$con=sha1(md5($pass));
		$c = "SELECT e.idem, e.nodocemp, e.nomemp, e.idper,p.nomper FROM empleado AS e INNER JOIN perfil AS p ON e.idper=p.idper WHERE nomemp='".$user."' AND pass='".$con."'";
	}
	$conexionBD= new conexion();

	$data=$conexionBD->ejeCon($c,0);

	
	if ($data){
	    $_SESSION["idem"] = $data[0]['idem'];
		$_SESSION["nomemp"] = $data[0]['nomemp'];
		$_SESSION["idper"] = $data[0]['idper'];
		$_SESSION["nomper"] = $data[0]['nomper'];
		$_SESSION["autentificado"] = "!*-?¡--";
		echo "<script type='text/javascript'>window.location='../home.php';</script>";
	}else{
		echo "<script type='text/javascript'>window.location='../index.php?errorusuario=si';alert('Sus credenciales son Incorrectas')</script>";
	}
}
?>