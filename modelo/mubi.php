<?php
include ("conexion.php");
class mubi{
	function mubi(){}
		
	function cons($con){
		$cnbd = new conexion();
	
		$cnbd->ejeCon($con,1);
	}
//SELECT codubi, nomubi, depubi FROM ubicacion
	function insubi($codubi, $nomubi,$depubi,$estubi){
		$sql= "INSERT INTO ubicacion (codubi, nomubi,depubi,estubi) VALUES ('$codubi','$nomubi','$depubi','$estubi');";
		$this->cons($sql);
	}

	function updubi($codubi, $nomubi,$depubi,$estubi){
		$sql= "UPDATE ubicacion SET nomubi='$nomubi',depubi='$depubi', estubi='$estubi' WHERE codubi='$codubi';";
		//echo $sql;
		$this->cons($sql);
	}

	function updest($codubi, $op){
		$sql= "UPDATE ubicacion SET estubi='$op' WHERE codubi='$codubi';";
		//echo $sql;
		$this->cons($sql);
	}
		
	function delubi($codubi){
		$sql= "DELETE FROM ubicacion WHERE codubi='$codubi';";
		$this->cons($sql);
	}

	function selubi(){
		$sql= "SELECT u.codubi, u.nomubi, u.depubi, v.nomubi AS depto, u.estubi FROM ubicacion as u INNER JOIN ubicacion as v ON u.depubi=v.codubi ORDER BY u.nomubi;";
		$cnbd = new conexion();
	
		$data = $cnbd->ejeCon($sql,0);
		return $data;
	}

	function selubi1($codubi){
		$sql= "SELECT codubi, nomubi,depubi,estubi FROM ubicacion WHERE codubi='$codubi';";
	//echo $sql;
		$conexionDB=new conexion();
	
		$data=$conexionDB->ejeCon($sql, 0);
		return $data;
	}

	function seldepto(){
		$sql= "SELECT codubi, nomubi FROM ubicacion where depubi=0";
		$cnbd = new conexion();

		$data= $cnbd->ejeCon($sql,0);
		return $data;
	}
	
	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT u.codubi, u.nomubi, v.nomubi AS depto, u.estubi FROM ubicacion AS u INNER JOIN ubicacion as v ON u.depubi=v.codubi";
		if($filtro)
			$sql.= " WHERE u.nomubi LIKE '%$filtro%'";
		$sql .= " ORDER BY u.nomubi LIMIT $rvalini, $rvalfin";
		//echo $sql;
		$conexionDB=new conexion();
		
		$data=$conexionDB->ejeCon($sql, 0);
		return $data;
	}
	
	function sqlcount($filtro){
		$conp ="SELECT count(u.codubi) as Npe FROM ubicacion as u INNER JOIN ubicacion as v ON u.depubi=v.codubi";
		if($filtro)
			$conp.= " WHERE u.nomubi LIKE '%$filtro%'";
		//echo $conp;
		return $conp;
	}
}
?>