<?php
	class Conexion{
		public function get_conexion(){
			include ("datos.php");
			$conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
			return $conexion;
		}
		function ejeCon($con,$a){
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($con);
			$result->execute();
			$res = NULL;
			while($f=$result->fetch())
				$res[]=$f;
			return $res;
		}
	}
?>