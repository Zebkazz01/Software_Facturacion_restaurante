<?php
include ("conexion.php");

class mdom{

private $iddom;
private $nomdom;

Private $idval;
Private $nomval;



function getNomdom(){
    return $this->nomdom;
}
function getIdval(){
	return $this->idval;
}       
function getNomval(){
	return $this->nomval;
}       
function getIddom(){
   return $this->iddom;
}


function setIdval($idval){
   $this->idval = $idval;
}
function setNomval($nomval){
   $this->nomval = $nomval;
}


function setIddom($iddom){
    $this->iddom = $iddom;
}
function setNomdom($nomdom){
    $this->nomdom = $nomdom;
}

	

	//selecioar iddom
	function seledom(){
		$sql="SELECT iddom FROM dominio WHERE iddom=:iddom";
		$modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
		$iddom = $this->getIdom();
        $result->bindParam(':iddom',$iddom);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
	}

    function seldom(){
        $sql = "SELECT iddom, nomdom FROM dominio";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
    function seldom1(){
        $sql = "SELECT iddom, nomdom FROM dominio WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom',$iddom);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
	function upddom(){
        $sql= "UPDATE dominio SET nomdom=:nomdom WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom',$iddom);
        $nomdom=$this->getNomdom();
        $result->bindParam(':nomdom',$nomdom);
        $result->execute();
    }
    function insdom(){
        $sql= "INSERT INTO dominio(nomdom) VALUES (:nomdom)";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
		$nomdom=$this->getNomdom();
		$result->bindParam(':nomdom',$nomdom);
		$result->execute();
    }
	function deldom(){
        $sql= "DELETE FROM dominio WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom',$iddom);
        $result->execute();

    }

 		//valores
	//selecionar codval
	/*function selval($filtro){
		$sql="SELECT v.codval,v.nom_val,d.nomdom from valor as v INNER JOIN  dominio as d ON v.iddom=d.iddom";
		$data2 = $this->consel($sql);
		return $data2;

	}*/


//eliminar valor
	function delval(){
		$modelo =new conexion();
		$conexion = $modelo->get_conexion();
		$sql ="DELETE FROM valor WHERE codval=:idval";
		$result = $conexion->prepare($sql);
		$idval = $this->getIdval();
		$result->bindParam(":idval",$idval);
		$result->execute();
	}
	//updavalor

	function updval(){
		$modelo =new conexion();
		$conexion = $modelo->get_conexion();
		$sql ="UPDATE valor SET nom_val=:nomval,iddom=:iddom WHERE codval=:idval";
		$result = $conexion->prepare($sql);
		$idval = $this->getIdval();
		$result->bindParam(":idval",$idval);
		$nomval = $this->getNomval();
		$result->bindParam(":nomval",$nomval);
		$iddom = $this->getIddom();
		$result->bindParam(":iddom",$iddom);
		$result->execute();
	}
	function selval1(){
		$resultado = null;
            $modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql =" SELECT v.codval, v.nom_val, v.iddom, d.nomdom, v.par_val FROM valor AS v INNER JOIN dominio AS d ON v.iddom=d.iddom WHERE codval=:idval";
            $result = $conexion->prepare($sql);
            $idval = $this->getIdval();
            $result->bindParam(":idval",$idval);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
}
	function insval(){
		$modelo =new conexion();
            $conexion = $modelo->get_conexion();
            $sql ="INSERT INTO valor(nom_val, iddom) VALUES ( :nomval, :iddom)";
            $result = $conexion->prepare($sql);
         
            $nomval = $this->getNomval();
            $result->bindParam(":nomval",$nomval);
            $iddom = $this->getIddom();
            $result->bindParam(":iddom",$iddom);
         
            $result->execute(); 
	
	}



	function buscar($filtro,$rvalini,$rvalfin){
		$sql = "SELECT v.codval,v.nom_val,d.nomdom from valor as v INNER JOIN  dominio as d ON v.iddom=d.iddom";
		if($filtro)
			$sql.= " WHERE v.nom_val LIKE '%".$filtro."%' OR d.nomdom LIKE '%".$filtro."%'";
		$sql .= " ORDER BY d.nomdom, v.nom_val LIMIT ".$rvalini.", ".$rvalfin;
		//echo $sql;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	
	function sqlcount($filtro){
		$conp ="SELECT count(v.codval) as Npe from valor as v INNER JOIN  dominio as d ON v.iddom=d.iddom";
		if($filtro)
			$conp.= " WHERE v.nom_val LIKE '%".$filtro."%' OR d.nomdom LIKE '%".$filtro."%'";
		//echo $conp;
		return $conp;
	}

}

?>