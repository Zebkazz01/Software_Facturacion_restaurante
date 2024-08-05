<?php 

include("conexion.php");

class majus{
		function majus(){}

		function cons($con){
		  $cnbd = new conexion();
		  $cnbd->conectarBD();
		  $cnbd->ejecon($con,1);
		}
		function consel($con){
		  $cnbd = new conexion();
		  $cnbd->conectarBD();
		  $resu =$cnbd->ejecon($con,0);
		  return $resu;
		}
		function todo(){
			$sql = "SELECT * FROM cliente INNER JOIN ubicacion using(codubi);";
			$data = $this->consel($sql);
			return $data;
		}

		function inscli($nodoccli,$nomcli,$dircli,$telcli,$codubi,$email){
			$sql = "INSERT INTO cliente(nodoccli,nomcli,dircli,telcli,codubi,emailcli) values('".$nodoccli."','".$nomcli."','".$dircli."','".$telcli."','".$codubi."','".$email."');";
			$this->cons($sql);
		}

		function delcli($del){
			$sql="DELETE FROM cliente WHERE noidecli='".$del."'";
		   $this->cons($sql);
		}

	   function select(){
	   	 $sql="SELECT nodoccli,nomcli,dircli,telcli,codubi FROM cliente";
	   	 //echo $sql;
		$this->cons($sql);
	   }

	   function selCliSeleccionado($edi){
	   		$sql = "SELECT * FROM cliente INNER JOIN ubicacion using(codubi) WHERE noidecli='".$edi."'"; 
	   		//echo $sql;
	   		$datosCliSeleccionado = $this->consel($sql);
	   		return $datosCliSeleccionado;
	   }


	   function consUbicacion(){
			$sql = "SELECT * FROM ubicacion;";
			$data = $this->consel($sql);
			return $data;
		}
		
		function update($nodoccli,$nomcli,$dircli,$telcli,$codubi,$edi,$email){
			$sql="UPDATE cliente SET nodoccli='".$nodoccli."', nomcli='".$nomcli."', dircli='".$dircli."', telcli='".$telcli."', codubi='".$codubi."',emailcli='".$email."' WHERE noidecli='".$edi."'";
			echo $sql;
			$this->cons($sql);
		}


		function consCli2($filtro){
		$sql= "SELECT * from cliente as c inner join ubicacion as u using(codubi)";
		//echo $sql;
		  if($filtro){
		  	$sql .=" WHERE c.nomcli LIKE '%".$filtro."%' OR c.nodoccli LIKE '%".$filtro."%' OR c.emailcli LIKE '%".$filtro."%'";
		}
	    $data = $this->consel($sql);
	    return $data;

		}

		/*
		function sqlcount($filtro){
			$sql= "SELECT count(nodoccli) AS ncli FROM cliente"
		}
		*/
     }
 
?>
