<?php include("conexion.php");

class mnom{
	function mnom(){}


	function cons($con){
		$cnbd = new conexion();
		
		$cnbd->ejeCon($con,1);
 	}
 	function consel($con){
 		$cnbd = new conexion();
 	
 		$resu = $cnbd->ejeCon($con,0);
 		return $resu;
 	}

 	function insertNomina($idem,$salario,$adelan){
 		$sql = "INSERT INTO nomina (idem,salario,adelan) values('".$idem."','".$salario."','".$adelan."');";
 		$this->cons($sql);
 	}
 	
 	function selEmpleado(){
 		$sql = "SELECT * FROM empleado";
 		$data = $this->consel($sql);
 		return $data;
 	}

 	function selNomina(){
 		$sql = "SELECT * FROM empleado AS e INNER JOIN nomina as n ON e.idem=n.idem INNER JOIN asistencia AS a ON n.idasis=a.idasis ORDER BY idnomi asc";
 		echo $sql;
 		$data = $this->consel($sql);
 		return $data;
 	}
 	
 	

	function actualizarNomina($act,$idem,$salario,$adelan){
		$sql = "UPDATE nomina SET idem='".$idem."',salario='".$salario."',adelan='".$adelan."' WHERE idnomi='".$act."'";
		$this->cons($sql);
	}



	function diasNoAsistidos($idem){
		$sql = "SELECT asist FROM asistencia where idem='".$idem."'";
		//jm echo $sql;
		$diasNoAsistidos = $this->consel($sql);
		return $diasNoAsistidos;
	}	
}
?>