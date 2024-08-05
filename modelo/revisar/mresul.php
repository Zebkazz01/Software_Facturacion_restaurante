<?php 
include("conexion.php"); 

class mresul{

	function mresul(){}

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

	function selresul($jorna){
		$sql="SELECT c.idcan, c.doccan, concat(c.nomcan,' ',c.apecan) as nom, 
		c.nofic, f.nomfic, c.foto,c.voto FROM candidato as c inner join 
		ficha as f on c.nofic=f.nofic WHERE f.jorna='".$jorna."' ORDER BY c.voto DESC";
		$data= $this->consel($sql);
		return $data;
	}
	function selval($iddom){
		$sql="SELECT idval, iddom, nomval, parval FROM valor WHERE iddom='".$iddom."' AND act=1";
		$data= $this->consel($sql);
		return $data;
	}
	function selresulf($jorna){
		$sql="SELECT c.idcan, c.doccan, concat(c.nomcan,' ',c.apecan) as nom, 
		c.nofic, f.nomfic, c.foto,c.voto FROM candidato as c inner join 
		ficha as f on c.nofic=f.nofic WHERE f.jorna='".$jorna."' AND c.act=1 ORDER BY c.voto DESC";
		$data= $this->consel($sql);
		return $data;
	}
	function selconf(){
		$sql="SELECT id, nomcen, nomreg, dircen, nomrespon, cargo FROM config;";
		$data= $this->consel($sql);
		return $data;
	}
	
	function selvalor($jorna){
		$sql="SELECT v.iddom, v.nomval, c.nofic, c.foto, c.voto, concat(c.nomcan,' ',c.apecan) as nomb FROM candidato as c INNER JOIN valor as v WHERE f.jorna='".$jorna."'";
		$data= $this->consel($sql);
		return $data;
	}
	//SELECT c.idcan, c.doccan, concat(c.nomcan,' ',c.apecan) as nom, c.nofic, f.nomfic, c.foto,c.voto FROM candidato as c inner join ficha as f on c.nofic=f.nofic WHERE f.jorna='1'
	function selpdf($jorna){
		$sql="SELECT v.iddom, v.nomval, c.nofic, c.foto, c.voto, concat(c.nomcan,' ',c.apecan) as nomb FROM candidato as c INNER JOIN valor as v WHERE f.jorna='".$jorna."'";
		$data= $this->consel($sql);
		return $data;
	}
}
?>