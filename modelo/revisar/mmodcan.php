<?php 
include("conexion.php"); 

class mverd{

	function mverd(){}
	function cons($con){
		$cnbd = new conexion();
		$cnbd->conectarBD();
		function selval($iddom){
		$sql = "SELECT idval, iddom, nomval, parval FROM valor WHERE iddom='".$iddom."'";
		$data = $this->consel($sql);
		return $data;
	}
		$cnbd->ejeCon($con,1);
	}
	function consel($con){
		$cnbd = new conexion();
		$cnbd->conectarBD();
		$resu = $cnbd->ejeCon($con,0);
		return $resu;
	}

//pendientre User
	function updCan($doccan, $nomcan, $apecan, $nofic, $ntarj, $foto, $tipopro, $emailsen, $emailper, $telfij, $telcel,$idcan){
		$sql= "UPDATE candidato SET foto='".$foto."', emailsen='".$emailsen."', telfij='".$telfij."', telcel='".$telcel."',doccan='".$doccan."',nomcan='".$nomcan."',apecan='".$apecan."',nofic='".$nofic."',ntarj='".$ntarj."',tipopro='".$tipopro."',emailper='".$emailper."' WHERE idcan='".$_SESSION["idUser"]."';";
		$this->cons($sql);
	}


	function selcan(){
		$sql="SELECT nomfic,nofic,emailsen,emailper,telfij,telcel,doccan,nomcan,apecan,ntarj,tipopro,foto FROM candidato INNER JOIN ficha using(nofic)WHERE idcan='".$_SESSION["idUser"]."'";
		$data= $this->consel($sql);
		return $data;
	}
	function selval($iddom){
		$sql="SELECT idval, iddom, nomval, parval FROM valor WHERE iddom='".$iddom."'";
		$data= $this->consel($sql);
		return $data;
	}


	function selfic(){
		$sql = "SELECT nofic, nomfic, jorna, sede FROM ficha";
		$data = $this->consel($sql);
		return $data;
	}

	
	

}
?>